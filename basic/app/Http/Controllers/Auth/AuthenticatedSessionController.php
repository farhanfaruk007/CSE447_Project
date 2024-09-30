<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        // Retrieve the user by username
        $user = User::where('username', $request->username)->first();

        if (!$user) {
            // If the user does not exist, throw a validation exception
            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }

        // Validate the provided password against the hashed+salted password
        if (!$this->validatePassword($request->password, $user->password, $user->password_salt)) {
            // If the password does not match, throw a validation exception
            throw ValidationException::withMessages([
                'username' => __('auth.failed'),
            ]);
        }

        // Authentication successful, log in the user
        Auth::login($user);

        // Regenerate the session
        $request->session()->regenerate();

        // Redirect the user to the intended destination or the home page
        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    /**
     * Validate the given password against the hashed+salted password.
     *
     * @param  string  $providedPassword
     * @param  string  $hashedPassword
     * @param  string  $salt
     * @return bool
     */
    private function validatePassword($providedPassword, $hashedPassword, $salt)
{
    // Combine the provided password with the salt
    $combinedPassword = $providedPassword . $salt;


    // Use Hash::check to compare the combined password with the hashed password
    $isPasswordCorrect = Hash::check($combinedPassword, $hashedPassword);


    return $isPasswordCorrect;
}


}
