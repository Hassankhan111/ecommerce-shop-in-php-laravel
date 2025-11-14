<?php

namespace App\Http\Controllers\backend;
use App\Models\Category;
use App\Models\sub_categorie;
use App\Models\brand;
use App\Models\Product;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class productsController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      
        $product_items = Product::with(['category', 'sub_categorie', 'brand'])->get();


        return view('backend.products.product', compact('product_items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
          $category = Category::all();
          $sub_categories = sub_categorie::all();
          $brands = brand::all();
          
        return view('backend.products.addproduct',compact('category','sub_categories','brands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = validator::make($request->all(),[
            'product_title' => 'required|string|max:255',
            'product_desc' => 'nullable|string',
            'product_price' => 'required|numeric',
            'product_qty' => 'sometimes|integer',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_cat' => 'nullable|exists:categories,cat_id',
            'product_sub_cat' => 'nullable|exists:sub_categories,sub_cat_id',
            'product_brand' => 'nullable|exists:brands,brand_id',
        ]);
           
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $products = $validate->validated();
         
        // Handle file upload if an image is provided
        if ($request->hasFile('product_img')) {
            //$$products['imageName'] = time() . '.' . $request->product_img->extension();
            $products['product_img'] = $request->file('product_img')->store('products','public');
        } 
    
        // Create the product
        $product = product::create($products);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request, $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
   
        $products = Product::with(['category', 'sub_categorie', 'brand'])->findOrFail($id);
        $brands = brand::all();
        $category = Category::all();
        $sub_categories = sub_categorie::all();

        return view('backend.products.editproduct',compact('products',
        'brands','category','sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $products = Product::findOrFail($id);

        $validate = validator::make($request->all(),[
            'product_title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'quantity' => 'sometimes|integer',
            'product_img' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category' => 'nullable|exists:categories,cat_id',
            'subcategory' => 'nullable|exists:sub_categories,sub_cat_id',
            'brand' => 'nullable|exists:brands,brand_id',
            'status' => 'nullable|in:Published,Draft',
        ]);
        
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        $data = $validate->validated();

        if ($request->hasFile('product_img')) {

        if ($products->image && Storage::disk('public')->exists($products->product_img)) {
            Storage::disk('public')->delete($products->product_img);
         }
          $data['product_img'] = $request->file('product_img')->store('products', 'public');
       }

        $products->update($data);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');

    }

                
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = product::findOrFail($id);
        $product->delete();
        if($product){
            return redirect()->route('product.index')->with('success', 'Product deleted successfully.');
        }else {
        return redirect()->back()->with('error', 'Failed to delete the product.');
        }
    }
}
