<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use File;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ProductController extends Controller implements Hasmiddleware
{
public static function middleware(): array{
    return [
        'auth',
        new Middleware('admin', except:['index', 'show']),
    ];
}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::get();

        return view('product.read', ['product' => $product]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::get();

        return view('product.create',  ['categories' => $category]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validations
        $request->validate([
        'name' => 'required|min:6',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'required|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('image'), $imageName);

        $product = new Product;

        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');
        $product->image = $imageName;

        $product->save();

        return redirect('/product')->with('success', 'Product has Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::find($id);

        
        return view('product.detail', [ 'product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::find($id);
        $category = Category::get();
        return view('product.edit', ['product' => $product, 'categories' => $category]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // validations
        $request->validate([
        'name' => 'required|min:6',
        'description' => 'required',
        'price' => 'required|numeric',
        'stock' => 'required|integer',
        'image' => 'mimes:jpg,jpeg,png|max:2048',
        ]);

        $product = Product::find($id);
        if($request->hasFile('image')){
            if($product->image){
                if(File::exists(public_path('image/'. $product->image))){
                File::delete(public_path('image/'. $product->image));
                }
                $imageName = time().'.'.$request->image->extension();
                $request->image->move(public_path('image'), $imageName);
                
                $product->image = $imageName;
            }
        }
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->category_id = $request->input('category_id');
        
        $product->save();

        return redirect('/product')->with('success', 'Product has Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if($product->image){
                if(File::exists(public_path('image/'. $product->image))){
                File::delete(public_path('image/'. $product->image));
                }
                }

        $product->delete();
        return redirect ('/product')->with('success', 'Product has Deleted');
    }
}
