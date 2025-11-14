<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class FrontendController
{
     //show user 
     public function userprofile(string $id){
          $userid = $id;
          $users = User::findOrFail( $userid);
          return view('Auth.frontend.profile',compact('users'));
     }

     // user profile
     public function user_profile(string $id){
          $user = User::findOrFail($id);
          return view('Auth.frontend.userprofile',compact('user'));
     }

     //update profile
     public function update_profile(request $request , $id)  {

          $user = User::findOrFail($id);

        $validator = validator::make($request->all(),[
        'fullname' => 'required',
        'username' => 'required',
        'phone' => 'required',
        'email' => 'required|email', 
        'address' => 'required',   
        ]);

        if($validator->fails()){
        
            return redirect()->back()->withErrors($validator)->withInput();
       }

          $data = $validator->validated();
            
          $user->update($data);

          return redirect()->route('register.save',Auth::id())->with('success','user Update successfully');
         
     }

          



    //add user
    public function create(request $request){

       $validator = validator::make($request->all(),[
        'fullname' => 'required',
        'username' => 'required',
        'phone' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'address' => 'required',
       ]);

       if($validator->fails()){
        
            return redirect()->back()->withErrors($validator)->withInput();
       }

          $data = $validator->validated();

          $user = User::create($data);
       
         if($user){
          return redirect()->route('home')->with('sucess','user created successfully');
         }
    }

    // login user

    public function userlogin(request $request){

     $validator = validator::make($request->all(),[
        'email' => 'required',
        'password' => 'required',
       ]);

       if($validator->fails()){
        
            return redirect()->back()->withErrors($validator)->withInput();
       }

       $credentail = $validator->validated();
         
       if(Auth::attempt($credentail)){
          
           $request->session()->regenerate();
            return redirect()->route('register.save',Auth::id())->with('success','User Login Successfully');
      
      
       }
            return redirect()->route('home')->with('error','Username and Password Uncorrect');
      
    }

    //chnage password
     public function changepassword(request $request ,$id){
        $userid = User::findOrFail($id);

         $validator = validator::make($request->all(),[
        'old_pass' => 'required',
        'new_pass' => 'required',
       ]);

       if($validator->fails()){
          return redirect()->back()->withErrors($validator)->withInput();
       }

       $data = $validator->validated();

        if(!Hash::check($data['old_pass'] , $userid->password)){
             return redirect()->back()->with('error', 'old password not correct.');
        }
        
        $userid->password = Hash::make($data['new_pass']);

        $userid->save();
        
         return redirect()->route('register.save',Auth::id())->with('success','Password Change Successfully');
      
      
    }


    //logout
    public function userlogout(){
      Auth::logout();

       return redirect()->route('home')->with('success','User Logout Successfully');
      
    }

}
