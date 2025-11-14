<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use App\Models\sub_categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategorysController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subcategory = sub_categorie::with('category')->get();

        return view('backend.subcategory.index',compact('subcategory'));
        
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('backend.subcategory.add',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'subCategory_title' => 'required|string|max:255',
            'category' => 'required|exists:categories,cat_id',
        ]);

        $Category = sub_categorie::create([
            'sub_cat_title' => $validatedData['subCategory_title'],
             'cat_parent' => $validatedData['category'] ?? null,
        ]);
        
        if($Category){
            return redirect()->route('subcategorys.index')->with('success','data insert successfully');
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
        $subcategory = sub_categorie::findOrFail(($id));
        $category = Category::all();
        return view('backend.subcategory.update',compact('subcategory','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = sub_categorie::findOrFail($id);

        $validatedData = $request->validate([
            
            'category_title' => 'required|string|max:255',
            'category' => 'required|exists:categories,cat_id',
        ]);

        if($validatedData){
            $category->sub_cat_title = $validatedData['category_title'];
            $category->cat_parent = $validatedData['category'] ?? null;
            $category->save();
            return redirect()->route('subcategorys.index')->with('success','data update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = sub_categorie::findOrFail($id);
        $category->delete();
        return redirect()->route('subcategorys.index')->with('success', 'Category deleted successfully.');
    }
}
