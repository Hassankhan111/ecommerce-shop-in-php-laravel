<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Symfony\Contracts\Service\Attribute\Required;

class AuthController
{
       public function index()
    {
        return view("Auth.register");
    }

    public function create(Request $request)
    {
        $request->validate([
            "fullname" => "required|max:255",
            "phone" => "required|max:255",
            "email" => "required|email|max:255|unique:admins,email",
            "username" => "required|max:255|min:6",
            "password" => "required|max:255|min:6",
            "address" => "required|max:255",
        ]);

        $user = new Admin();

        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->save();
        session(['name' => $user->fullname]);
        if ($user) {

            return redirect()->route("admin.login")->with("success", session()->get('name') . " " . "Your Registeration Done successfully");
        }

        return back()->with("error", "Something went wrong");
    }




    /*login <controller></controller>*/
    public function login()
    {
        return view("Auth.login");
    }

    /*login <controller></controller>*/
      public function show(Request $request)
    {
        $user = Admin::where('username', $request->username)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            if($user->admin_role =='admin'){
                session(['name'=>true]);
                  return redirect()->route("Admin.dashboard")->with("success", "Successfully Login");
            }else{
                 return redirect()->route("login")->with("error", "You are Not Admin");
            }
        }else{
           return redirect()->route("login")->with("error", "Invalid Username And Password");
        }
   }


    
     /*logout <controller></controller>*/
   public function logout()
    {
       session()->forget('name');
        return redirect()->route("admin.login");
    }



     /*logout <controller></controller>*/
    public function adminindex()
    {
        $user = Admin::all();
        return view("Auth.profile",['user'=> $user]);
    }




    /*update Admin profile */
      public function edite(request $request , string $id)
    {
        $user = Admin::find($id);

        $user->fullname = $request->fullname;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->admin_role = $request->admin_role;

        $user->save();
        
    } 
}
