<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Container\Attributes\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class backendController
{
//view login page
   public function index()
   {
     return view("Auth.backend.index");
    }



    //login match
    public function login(Request $request){

        $validateData = validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required',
        ]);

        if($validateData->fails()){
            return redirect()->back()->withErrors($validateData)->withInput();
        }

        $data = $validateData->validated();

        $admin = Admin::where('username',$data['username'])->first();
        if($admin && Hash::check($data['password'],$admin->password)){
            //login success
             $request->session()->put('admin_id',$admin->adminId);
            $request->session()->put('name',$admin->fullname);

            return redirect()->route('dashboard')->with('success','Login Successfully');
        }else{
            //login fail
            return redirect()->route('admin.login')->with('error','invalid username or password');
        }
    }

    //signup form
    public function create(){
        
        return view('auth.backend.account');
    }

    //add admin 
    public function add(request $request){

        $request->validate([
            "fullname" => "required|max:255",
            "phone" => "required|max:255",
            "email" => "required|email|max:255|unique:users,email",
            "username" => "required|max:255|min:5",
            "password" => "required|max:255|min:5",
            "address" => "required|max:255",
            "role" => "required|max:255",
        ]);

        $admin = new Admin();

        $admin->fullname = $request->fullname;
        $admin->phone = $request->phone;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->address = $request->address;
        $admin->admin_role = $request->role;
        $admin->save();
        if ($admin) {
            return redirect()->route("dashboard")->with("success", "Your Registeration Done successfully");
        }

        return back()->with("error", "Something went wrong");
    }

    //change password form
    public function changepassword(){
        return view('auth.backend.admin-password');
    }


    //update password
    public function Updatepassword(request $request){

      $request->validate([
        'old_pass" => "required|max:255|min:5',
        'new_pass" => "required|max:255|min:5',
      ]);
      
      $sessionname = session('name');

      $admin_name = Admin::where('fullname',$sessionname)->first();

      if(!$admin_name){
          return redirect()->back()->with('error', 'Admin not found in session.');
       }

       if(!Hash::check( $request->old_pass ,$admin_name->password)){
          return redirect()->back()->with('error', 'old password not correct.');
       }
       
      
       $admin_name->password = Hash::make($request->new_pass);

       $admin_name->save();
       
          return redirect()->back()->with('success', 'password change successfully.');
      

    }


    //loging out 
    public function logout(request $request){

        $request->session()->flush();
        return redirect()->route('admin.login')->with('success','logout succssfully');
    }

 }

