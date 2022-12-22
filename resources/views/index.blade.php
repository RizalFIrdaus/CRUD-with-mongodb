@extends('layouts.app')

@section('title', 'Product Table')

@section('content')
<h1 class="font-bold text-4xl">Product Table</h1>

@if (Session::has('message'))
<div class="bg-green-400 py-2 px-6 mt-4 font-bold text-md text-white p-4">{{ Session::get('message') }}</div>
@endif
<a href="{{ url('/create/product') }}" class="hover:bg-gray-600 py-2 px-4 bg-green-300 font-semibold text-white shadow-lg inline-block my-6 ">Add Product</a>
<div class="overflow-x-auto relative shadow-md sm:rounded-lg">
    <table class="w-full text-md text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-white uppercase bg-gray-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Product name
                </th>
                <th scope="col" class="py-3 px-6">
                    Brand
                </th>
                <th scope="col" class="py-3 px-6">
                    Category
                </th>
                <th scope="col" class="py-3 px-6">
                    Price
                </th>
                <th scope="col" class="py-3 px-6">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr
                    class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $product['name'] }}
                    </th>
                    <td class="py-4 px-6">
                        {{ $product['brand'] }}
                    </td>
                    <td class="py-4 px-6">
                        {{ $product['category'] }}
                    </td>
                    <td class="py-4 px-6">
                        Rp.{{number_format($product['price'],0,',','.') }}
                    </td>
                    <td class="py-4 px-6 text-right">
                        <a href="/edit/{{ $product['id'] }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline mr-4">Edit</a>
                        <a href="{{ $product['id'] }}" class="font-medium text-red-600 dark:text-blue-500 hover:underline">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


@endsection