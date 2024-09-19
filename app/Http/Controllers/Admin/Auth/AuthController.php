<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Auth\LoginRequest;
use App\Http\Requests\Admin\Auth\RegisterRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }
    
    public function registerForm()
    {
        return view('admin.auth.register');
    }
    
    public function register(RegisterRequest $request)
    {
        $admin = Admin::create($request->validated());
        
        Auth::guard('admin')->login($admin);
        
        return redirect(route('admin.dashboard'));
    }
    
    public function loginForm()
    {
        return view('admin.auth.login');
    }

    
    public function login(LoginRequest $request)
    {
        if(Auth::guard('admin')->attempt($request->only(['email', 'password'])))
        {
            return redirect(route('admin.dashboard'));
        }

        throw ValidationException::withMessages([
            'email' => trans('auth.failed'),
        ]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect(route('admin.loginForm'));
    }
}
