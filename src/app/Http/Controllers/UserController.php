<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('role')->get();
        $role = Role::all();
        return view('user.index', compact('users', 'role'));
    }

    public function store(Request $request)
    {

        $user = User::create([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $user = User::find($id);
        $role = Role::all();
        return view('user.edit', compact('user', 'role'));
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)->update([
            'role_id' => $request->role,
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('user.index');
    }
}
