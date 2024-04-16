<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $products=Product::query()->paginate(2);
        return view("product.welcome" ,compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
  

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
  
        request()->validate([
            "name" => "required|min:5",
            "description" => "required",
            "quantity" => "required",
            "image" => "required|mimes:png,jpg,webp|max:2048",
            "price"=> "required",

           ]);   
    
                
     
       $image = $request->file("image");
        $imageName = time() . "_" . $image->getClientOriginalName();
        $image->storeAs("public/img", $imageName);
        
         
 

        Product::create([
            "name" => $request->name,
            "description" => $request->description,
            "quantity" => $request->quantity,
            "image" => $imageName,
            "price" => $request->price,

        ]);  

        return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
     

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
        request()->validate([
            "name" => "required|min:5",
            "description" => "required",
            "quantity" => "required",
            "image" => "required|mimes:png,jpg,webp|max:2048",
            "price"=> "required",


           ]);  

           
           $uploadedFile = $request->file("image");

           $uploadedFile->move("storage/img", $product->image);
           

           $product->update([
            "name" => $request->name,
            "description" => $request->description,
            "quantity" => $request->quantity,
            "image" => $request->image,
            "price" => $request->price,
        ]);
        return back();
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
     
       
        $product->delete();
        return back();
    }
}

