<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\KeyManagement;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255', 'unique:users'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'date_of_birth' => ['required', 'date'],
        'address' => ['required', 'string', 'max:255'],
        'phone_number' => ['required', 'string', 'max:20'],
    ]);

    // Begin a database transaction
    DB::beginTransaction();

    try {
        // Generate RSA key pair
        $config = [
            'digest_alg' => 'sha512',
            'private_key_bits' => 2048,
            'private_key_type' => OPENSSL_KEYTYPE_RSA,
        ];
        $privateKey = openssl_pkey_new($config);

        // Extract public key
        $publicKeyDetails = openssl_pkey_get_details($privateKey);
        $publicKey = $publicKeyDetails['key'];

        // Export private key as a string
        openssl_pkey_export($privateKey, $privateKeyString);

        // Generate a salt
        $salt = Str::random(16);

        // Hash and salt the password
        $hashedPassword = Hash::make($request->password . $salt);

        // Encrypt sensitive user information
        $encryptedData = [
            'name' => $this->encryptWithPublicKey($request->name, $publicKey),
            'username' => $request->username,
            'email' => $this->encryptWithPublicKey($request->email, $publicKey),
            'password' => $hashedPassword,
            'date_of_birth' => $this->encryptWithPublicKey($request->date_of_birth, $publicKey),
            'address' => $this->encryptWithPublicKey($request->address, $publicKey),
            'phone_number' => $this->encryptWithPublicKey($request->phone_number, $publicKey),
            'password_salt' => $salt, // Store the salt in the database
        ];

        // Create the user with encrypted data
        $user = User::create($encryptedData);

        // Store public and private keys in key management table
        $keyManagement = new KeyManagement();
        $keyManagement->public_key = $publicKeyDetails['key']; // Store public key
        $keyManagement->private_key = $privateKeyString; // Store private key
        $keyManagement->user_id = $user->id; // Store user id
        $keyManagement->save();

        // Commit the transaction
        DB::commit();

        // Login the user
        Auth::login($user);

        // Redirect to home
        return redirect(RouteServiceProvider::HOME);
    } catch (\Exception $e) {
        // If an exception occurs, rollback the transaction
        DB::rollback();

        // Handle the exception (e.g., log it, show an error message)
        dd($e->getMessage());
    }
}

    private function encryptWithPublicKey($data, $publicKey)
    {
        openssl_public_encrypt($data, $encrypted, $publicKey);
        return base64_encode($encrypted);
    }

    private function decryptWithPrivateKey($encryptedData)
    {
        // Retrieve the private key from the key management table based on the user's ID
        $userId = Auth::id();
        $keyManagement = KeyManagement::where('user_id', $userId)->first();
    
        if (!$keyManagement) {
            // Handle the case where the private key is not found for the current user
            // You may want to log an error or throw an exception
            return null;
        }
    
        // Extract the private key
        $privateKey = $keyManagement->private_key;
    
        // Decrypt the data using the private key
        $decryptedData = '';
        $success = openssl_private_decrypt(base64_decode($encryptedData), $decryptedData, $privateKey);
    
        if (!$success) {
            // Handle decryption failure
            // You may want to log an error or throw an exception
            return null;
        }
    
        return $decryptedData;
    }
    
}
