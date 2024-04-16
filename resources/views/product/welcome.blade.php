<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite(['resources/js/app.js'])
    @vite('resources/css/app.css')
    <title>Ecomerce store</title>


</head>

<body>
    <h1 class="text-center p-2">Product <a href="{{ route('create.index') }}" class="btn btn-primary"> Creat Product</a>
    </h1>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-center text-sm font-light text-surface dark:text-white">
                        <thead
                            class="border-b border-neutral-200 bg-[#332D2D] font-medium text-white dark:border-white/10">
                            <tr>
                                <th scope="col" class=" px-6 py-4">#ID</th>
                                <th scope="col" class=" px-6 py-4">Name</th>
                                <th scope="col" class=" px-6 py-4">Description</th>
                                <th scope="col" class=" px-6 py-4">Quantity</th>
                                <th scope="col" class=" px-6 py-4">Image</th>
                                <th scope="col" class=" px-6 py-4">Price</th>
                                <th scope="col" class=" px-6 py-4">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-black">



                            @forelse($products as $product)
                                <tr class="border-b border-neutral-200 dark:border-white/10">
                                    <td class="whitespace-nowrap  px-6 py-4 font-medium">{{ $product->id }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $product->name }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $product->description }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $product->quantity }}</td>
                                    <td class="whitespace-nowrap  px-6 py-4"><img width="100"
                                            src="{{ asset('storage/img/' . $product->image) }}" alt=""></td>
                                    <td class="whitespace-nowrap  px-6 py-4">{{ $product->price }} MAD</td>
                                    <td class="whitespace-nowrap  px-6 py-4">
                                        <div>
                                            <a href="{{ route('edit.index' ,$product) }}" class="btn btn-primary"> Update</a>
                                            <form action="{{ route('product.delete', $product) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" name="submit"
                                                    id="" value="Delete">
                                            </form>

                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" align="center">
                                        <h4>NO PRODUCTS</h4>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>
