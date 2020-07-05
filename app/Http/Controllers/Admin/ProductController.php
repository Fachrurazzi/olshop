<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('name', 'asc')->paginate(config('olshop.pagination'));
        $products->load('categories');

        return view('application.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('application.product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'description' => 'required|min:10',
            'price' => 'required',
            'category.*' => 'required'
        ]);

        $product = new Product;

        $image = $request->file('image')->store('products');

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->description = $request->description;
        $product->price = str_replace(",", "", $request->price);
        $product->image = $image;

        $product->save();

        $categories = Category::find($request->category);

        $product->categories()->attach($categories);

        return redirect()->route('product.index')->with('success', 'Product Added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        return view('application.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $image = $product->image ?? null;
        if($request->hasFile('image')) {
            if($product->image) {
                Storage::delete($product->image);
            }

            $image = $request->file('image')->store('products');
        }

        $product->name = $request->name;
        $product->slug = str_slug($request->name);
        $product->price = str_replace(",", "", $request->price);
        $product->description = $request->description;
        $product->image = $image;

        $product->categories()->sync($request->category);
        $product->save();

        return redirect()->route('product.index')->with('info', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        Storage::delete($product->image);
        $product->delete();
        return back()->with('danger', 'Product Deleted');
    }
}
