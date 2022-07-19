<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Category;

class ProduitController extends Controller
{
    public function index()
    {

        $categories = Category::orderBy('name', "desc")->get();

        $products = Produit::orderBy('name', "desc")->get();

        return view('product.index', ['products'=>$products, 'categories'=>$categories]);
    }

    public function create() {
        $categories = Category::orderBy('name', 'desc')->get();
        return view('product.create', ['categories'=>$categories]);
    }

    public function show($id) {
        $product = Produit::findOrFail($id);
        return view('product.show', ['product'=> $product]);
    }

    public function store(Request $request) {

        $product = new Produit();
        error_log(request()->hasFile('image'));

        $product->image = substr(request()->file('image')->store('public/assets/images'),7);
        $product->name = request('name');
        $product->price = request('price');
        $product->quantity = request('quantity');
        $product->quantity_type = request('quantity_type');
        $product->category_id = request('category');

        $product->save();

        return redirect('/');
    }

    public function edit($id) {
        $product = Produit::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        return view('product.edit', ['product'=> $product, 'categories'=>$categories]);
    }

    public function update(Request $request, $id) {

        $product = Produit::findOrFail($id);
        $product->image = $request->file('image')->store('public/assets/images');
        $product->name = request('name');
        $product->price = request('price');
        $product->quantity = request('quantity');
        $product->quantity_type = request('quantity_type');
        $product->category_id = request('category');

        $product->update();
        return redirect("/product/" . $id);
    }

    public function destroy($id) {
        $product = Produit::findOrFail($id);
        $product->delete();
        return redirect('/');
    }

}
