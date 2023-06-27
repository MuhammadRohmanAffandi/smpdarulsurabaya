<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    //
    public function index()
    {
        $user = User::all();
        return view('admin.allUser', compact('user'));
    }

    public function updateRole(Request $request)
    {
        $request->validate([
            'role' => 'required'
        ]);
        if (Auth::user()->role != "sadmin") {
            return redirect()->back()->with('message', 'Anda Bukan Super Admin!');
        }
        if (Auth::id() == $request->bookId) {
            return redirect()->back()->with('message', 'Anda Tidak Dapat Merubah Role Anda Sendiri!');
        }
        $user = User::find($request->bookId);
        $user->role = $request->role;
        $user->update();
        return redirect('alluser')->with('message-success', 'Berhasil Merubah Role User');
    }

    public function registerUser(Request $request)
    {
        //
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect('alluser');
    }
}
