<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Show the login form
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Handle an authentication attempt
     */
    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'cin' => 'required|string',
            'reference' => 'required|string'
        ]);

        // Find user by CIN
        $user = User::where('cin', $request->input('cin'))->first();

        // Check if user exists and reference matches
        if ($user && $this->checkReference($user, $request->input('reference'))) {
            // Authenticate the user
            Auth::login($user);

            // Redirect to intended page or dashboard
            return redirect()->intended('/dashboard');
        }

        // If authentication fails, redirect back with error
        return back()->withErrors([
            'login' => 'المعلومات المقدمة غير صحيحة. يرجى المحاولة مرة أخرى.',
        ])->withInput($request->only('cin'));
    }

    /**
     * Logout the user
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate CSRF token
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    /**
     * Custom method to check reference number
     * This is a placeholder - implement your specific reference validation logic
     */
    protected function checkReference(User $user, string $reference): bool
    {
        // Example implementation:
        // Compare the provided reference with a stored reference
        return $user->doc_reference == $reference;
    }
}
