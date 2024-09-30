<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\KeyManagement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class AdminController extends Controller
{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully', 
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function Profile()
    {
        $id = Auth::user()->id;
        $adminData = User::find($id);
    
        // Decrypt sensitive user information
        $decryptedData = [
            'name' => $this->decryptWithPrivateKey($adminData->name),
            'email' => $this->decryptWithPrivateKey($adminData->email),
            'date_of_birth' => $this->decryptWithPrivateKey($adminData->date_of_birth),
            'address' => $this->decryptWithPrivateKey($adminData->address),
            'phone_number' => $this->decryptWithPrivateKey($adminData->phone_number),
        ];
    
        return view('admin.admin_profile_view', compact('adminData', 'decryptedData'));
    }

    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);
    
        // Decrypt sensitive user information
        $decryptedData = [
            'name' => $this->decryptWithPrivateKey($editData->name),
            'email' => $this->decryptWithPrivateKey($editData->email),
            'date_of_birth' => $this->decryptWithPrivateKey($editData->date_of_birth),
            'address' => $this->decryptWithPrivateKey($editData->address),
            'phone_number' => $this->decryptWithPrivateKey($editData->phone_number),
        ];
    
        return view('admin.admin_profile_edit', compact('editData', 'decryptedData'));
    }

    public function StoreProfile(Request $request)
{
    // Retrieve user ID
    $userId = Auth::user()->id;
    
    // Retrieve user
    $user = User::find($userId);

    // Retrieve user's key management
    $keyManagement = KeyManagement::where('user_id', $userId)->first();

    // Ensure keys are found
    if (!$keyManagement || empty($keyManagement->public_key) || empty($keyManagement->private_key)) {
        throw new \Exception("Keys not found for user ID: $userId");
    }

    // Use existing keys
    $publicKey = $keyManagement->public_key;
    $privateKey = $keyManagement->private_key;

    // Encrypt sensitive data with RSA public key
    $encryptedData = [
        'name' => $this->rsaEncrypt($request->name, $publicKey),
        'email' => $this->rsaEncrypt($request->email, $publicKey),
        'date_of_birth' => $this->rsaEncrypt($request->date_of_birth, $publicKey),
        'address' => $this->rsaEncrypt($request->address, $publicKey),
        'phone_number' => $this->rsaEncrypt($request->phone_number, $publicKey),
    ];

    // Update non-sensitive data
    $user->username = $request->username;

    // Update encrypted sensitive data
    $user->name = $encryptedData['name'];
    $user->email = $encryptedData['email'];
    $user->date_of_birth = $encryptedData['date_of_birth'];
    $user->address = $encryptedData['address'];
    $user->phone_number = $encryptedData['phone_number'];

    // Save user changes
    $user->save();

    // Redirect with success message
    $notification = array(
        'message' => 'Admin Profile Updated Successfully',
        'alert-type' => 'info'
    );

    return redirect()->route('admin.profile')->with($notification);
}

    // Method to encrypt data with RSA public key
    private function rsaEncrypt($data, $publicKey)
{
    openssl_public_encrypt($data, $encryptedData, $publicKey);
    return base64_encode($encryptedData);
}


    public function ChangePassword()
    {
        return view('admin.admin_change_password');
    }

    public function updatePassword(Request $request)
    {
        $validatedData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);
    
        // Retrieve the authenticated user
        $user = Auth::user();
    
        // Retrieve the salt from the database
        $salt = $user->password_salt;
    
        // Validate old password
        if (!Hash::check($request->oldpassword . $salt, $user->password)) {
            session()->flash('message', 'Old password is not correct');
            return redirect()->back();
        }
    
        // Generate a new random salt
        $newSalt = Str::random(16);
    
        // Hash the new password with the new salt
        $hashedPassword = Hash::make($request->newpassword . $newSalt);
    
        // Update password and salt in the database
        $user->password = $hashedPassword;
        $user->password_salt = $newSalt;
        $user->save();
    
        session()->flash('message', 'Password Updated Successfully');
        return redirect()->back();
    }
    


    // Method to decrypt with private key
    private function decryptWithPrivateKey($encryptedData)
    {
        // Retrieve the private key from the database
        $userId = Auth::id();
        $keyManagement = KeyManagement::where('user_id', $userId)->first();
    
        // Check if the private key is found
        if (!$keyManagement) {
            // Handle the case where the private key is not found
            // You may want to log an error or throw an exception
            return null;
        }
    
        // Extract the private key
        $privateKey = $keyManagement->private_key;
    
        // Decrypt the data using the private key
        $decryptedData = '';
        $success = openssl_private_decrypt(base64_decode($encryptedData), $decryptedData, $privateKey);
    
        // Check if decryption was successful
        if (!$success) {
            // Handle decryption failure
            // You may want to log an error or throw an exception
            return null;
        }
    
        return $decryptedData;
    }
}
