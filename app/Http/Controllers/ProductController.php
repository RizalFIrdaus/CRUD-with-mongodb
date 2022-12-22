<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provinces;
use Illuminate\Http\Request;
use MongoDB\Operation\Find;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('index', compact('products'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'max:10|required',
            'category' => 'string|required',
            'brand' => 'string|required',
            'price' => 'integer|required',
        ]);

        $product = new Product;
        $product['name'] = $request->name;
        $product['category'] = $request->category;
        $product['brand'] = $request->brand;
        $product['price'] = $request->price;
        $product->save();
        return redirect('/')->with('message', 'Successfully Added Data Product');
    }

    public function edit($id)
    {
        $product = Product::find($id);

        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category = $request->category;
        $product->brand = $request->brand;
        $product->price = $request->price;
        $product->update();
        return redirect('/')->with('message', 'Successfully Updated Data Product');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('/')->with('message', 'Successfully Delete Data Product');
    }
}
