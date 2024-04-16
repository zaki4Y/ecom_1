<?php

namespace App\Http\Controllers;

use App\Models\Creat;
use App\Models\Product;
use Illuminate\Http\Request;

class CreatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
        $product= new Product();
        return view("product.create" ,compact("product"));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Creat $creat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Creat $creat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Creat $creat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Creat $creat)
    {
        //
    }
}
