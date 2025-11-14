<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class CategorysController 
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::all();
        return view('backend.Category.index',compact('category'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.Category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Category_title' => 'required|string|max:255',
        ]);

        $Category = Category::create([
            'cat_title' => $validatedData['Category_title'],
        ]);
        
        if($Category){
            return redirect()->route('categorys.index')->with('success','data insert successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $category = Category::findOrFail(($id));
        return view('backend.Category.update',compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $validatedData = $request->validate([
            'category_title' => 'required|string|max:255',
        ]);

        if($validatedData){
            $category->cat_title = $validatedData['category_title'];
            $category->save();
            return redirect()->route('categorys.index')->with('success','data update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('categorys.index')->with('success', 'Category deleted successfully.');
    }
}
