<?php

namespace App\Http\Controllers\backend;

use App\Models\Option;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class optionController{

    
    public function index()
    {
        $options = Option::all();
        return view('backend.setting',compact('options'));
    }



    public function update(Request $request, string $id)
    {
        
       $option = Option::findOrFail($id);

        $validate = Validator::make($request->all(), [
        'site_name' => 'required|string|max:255',
        'site_title' => 'required|string',
        'site_logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'site_desc' => 'required|string',
        'footer_text' => 'required|string',
        'currency_format' => 'required|string|max:20',
        'contect_phone' => 'required|string|max:20',
        'contect_email' => 'required|email',
        'contect_address' => 'required|string',
        ]);
        

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = $validate->validated();

        if ($request->hasFile('site_logo')) {

            if($option->image && Storage::disk('public')->exists($option->new_logo)){
               Storage::disk('public')->delete($option->new_logo);
            }
            
            $data['site_logo'] = $request->file('site_logo')->store('new_logo','public');
        }

       $option->update($data);
           return redirect()->route('settings.index')->with('success', 'Settings Update successfully.');


    }


}
