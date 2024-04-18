<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        $users = User::all();
        return view('admin.user.index', ['users' => $users]);
    }

    public function create(): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect()->route('admin.user.index');
    }

    public function show(User $user): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.show', ['user' => $user]);
    }

    public function edit(User $user): Factory|Application|View|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.user.edit', ['user' => $user]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user->update($input);
        return redirect()->route('admin.user.index');
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();
        return redirect()->route('admin.user.index');
    }

}
