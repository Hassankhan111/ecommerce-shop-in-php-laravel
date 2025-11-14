<?php

namespace App\Http\Controllers\backend;
use App\Models\brand;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class barandsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = brand::with('category')->get();
        return view('backend.brands.index',compact('brands'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = brand::with('category')->get();
        $category = Category::all();
        return view('backend.brands.addbrand',compact('brands','category'));
         // --- IGNORE ---
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'brand_title' => 'required|string|max:255',
            'category' => 'nullable|exists:categories,cat_id',
        ]);

        $brand = brand::create([
            'brand_name' => $validatedData['brand_title'],
            'cat_name' => $validatedData['category'] ?? null,
        ]);
        
        if($brand){
            return redirect()->route('brands.index')->with('success','data insert successfully');
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
        $brands = brand::findOrFail(($id));
        $category = Category::all();
        return view('backend.brands.editbrand',compact('brands','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $brands = brand::findOrFail($id);

        $validatedData = $request->validate([
            'brand_title' => 'required|string|max:255',
            'category' => 'nullable|exists:categories,cat_id',
        ]);

        if($validatedData){
            $brands->brand_name = $validatedData['brand_title'];
            $brands->cat_name = $validatedData['category'] ?? null;
            $brands->save();
            return redirect()->route('brands.index')->with('success','data update successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = brand::findOrFail($id);
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
