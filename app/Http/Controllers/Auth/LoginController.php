<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use Illuminate\Validation\ValidationException;
use App\Models\{SuperAdmin, Management, Principal, Teacher, StaffMember};

class LoginController extends Controller
{
    protected array $roles = [
        'super_admin' => SuperAdmin::class,
        'management'  => Management::class,
        'principal'   => Principal::class,
        'teacher'     => Teacher::class,
        'staff'       => StaffMember::class,
    ];

    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Login Check process with all model

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        foreach ($this->roles as $guard => $model) {
            $user = $model::where('email', $credentials['email'])->first();

            if ($user && Hash::check($credentials['password'], $user->password)) {
                if (!$user->is_active) {
                    return back()->withErrors(['email' => 'Account is inactive.']);
                }

                Auth::guard($guard)->login($user);
                return redirect()->route("{$guard}.dashboard")->with('success', 'Login successful!');
            }
        }

        throw ValidationException::withMessages([
            'email' => ['Invalid credentials. Please try again.'],
        ]);
    }

    public function logout(Request $request)
    {
        foreach (array_keys($this->roles) as $guard) {
            if (Auth::guard($guard)->check()) {
                Auth::guard($guard)->logout();
                break;
            }
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
