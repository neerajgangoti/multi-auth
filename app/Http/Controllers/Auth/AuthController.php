<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;
use App\Models\{SuperAdmin, Management, Principal, Teacher, StaffMember};

class AuthController extends Controller
{
    /**
     * An associative array mapping role keys to their respective model classes.
     */
    protected array $roles = [
        'super_admin' => SuperAdmin::class,
        'management'  => Management::class,
        'principal'   => Principal::class,
        'teacher'     => Teacher::class,
        'staff'       => StaffMember::class,
    ];

    /**
     * Display the login form view.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle the login request and authenticate the user based on role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        // Loop through each role to find matching user
        foreach ($this->roles as $guard => $model) {
            // Attempt to retrieve user with matching email
            $user = $model::where('email', $credentials['email'])->first();

            // Check if user exists and password is correct
            if ($user && Hash::check($credentials['password'], $user->password)) {
                // If the user is inactive, prevent login
                if (!$user->is_active) {
                    return back()->withErrors(['email' => 'Account is inactive.']);
                }

                // Log in user using the corresponding guard
                Auth::guard($guard)->login($user);

                // Redirect to the appropriate dashboard with success message
                return redirect()->route("{$guard}.dashboard")->with('success', 'Login successful!');
            }
        }

        // If none of the roles matched, throw validation exception
        throw ValidationException::withMessages([
            'email' => ['Invalid credentials. Please try again.'],
        ]);
    }

    /**
     * Log out the currently authenticated user from any role guard.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        // Loop through all role guards and log out the first one that's authenticated
        foreach (array_keys($this->roles) as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                break;
            }
        }

        // Invalidate the session and regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect back to the login page
        return redirect('/login');
    }
}
