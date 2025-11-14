<?php

namespace App\Http\Controllers\backend;
 use App\Models\User;
use Illuminate\Http\Request;

class UserController
{
    public function index()
    {
        $users = User::all();
        return view('backend.users.index',compact('users'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }

    public function view($id)
    {
        $users = User::findOrFail($id);
        if(!empty($users)){
            return response()->json( $users);
        }
    }
}
