<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.login');
    }

    public function register(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('auth.register');

    }

    public function postRegister(Request $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['role'] = User::ROLE_USER;
        User::create($input);
        return redirect()->route('login.index');

    }

    public function postLogin(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('admin.product.index');
            }
            return redirect()->route('user.shop.index');

        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login.index');
    }

}
