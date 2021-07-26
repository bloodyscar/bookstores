<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user){
        $users = User::all();
        return view('pages.admin.users.index', compact('users'));
    }

    public function edit(User $user){
        return view('pages.admin.users.edit', compact('user'));
    }

    public function update(User $user){
        $attr = request()->all();
        $user->update($attr);
        return redirect('member');
    }

    public function destroy(User $user){
        $user->delete();
        return redirect()->route('member');
    }
}
