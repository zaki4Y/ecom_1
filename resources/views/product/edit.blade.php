@extends('layouts.index')
@section('content')
    <form action=" {{ route("product.update" , $product) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="flex justify-center items-center h-screen rounded-full ">
        <div class="flex-col justify-evenly w-[30%] bg-red-300 p-5 items-center ">
            <div class="p-2">
                <label for="name" id="name">Name</label>
                <input type="text" name="name" placeholder=" Insert name" value="{{ old('name' ,$product->name) }}">
            </div>

            <div class="p-2">
                <label for="description" id="description">description</label>
                <input type="text" name="description" placeholder=" Insert description" {{ old('discription' ,$product->description) }}>
            </div>

            <div class="p-2">
                <label for="quantity" id="quantity">Quantity</label>
                <input type="text" name="quantity" placeholder=" Insert quantity" value="{{ old('Quantity' ,$product->quantity) }}">
            </div>



            <div class="p-2">
                <label for="image" id="image">Image</label>
                <input type="file" name="image" placeholder=" Insert Image" enctype="multipart/form-data">
                
            </div>

            <div class="p-2">
                <label for="price" id="price">Price</label>
                <input type="text" name="price" placeholder=" Insert price" value="{{ old('price' ,$product->price) }}">
            </div>


            <div class="p-2">
                <button class="bg-cyan-500 shadow-lg shadow-cyan-500/50" type="submit">ADD PRODUCT </button>
            </div><div><a href="{{ route('home.index') }}" class="btn btn-primary">Show all product </a></div>
        </div> 
        
        
        </div>
        

    </form>

 


@endsection