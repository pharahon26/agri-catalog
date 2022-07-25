<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Category;
use Image;
use Auth;
use Storage;

class ProduitController extends Controller
{
    public function index()
    {

        $categories = Category::orderBy('name')->get();

        $products = Produit::orderBy('name')->cursorPaginate(5);

        return view('product.index', ['products'=>$products, 'categories'=>$categories]);
    }

    public function search()
    {
        $products = Produit::orderBy('name', "desc")->cursorPaginate(5);
        $search = request('search');
        $category = request('category');

        if ($search){
            $products = Produit::orderBy('name', "desc")->where('name','LIKE', '%' . $search .'%')->cursorPaginate(5);
        }
        if($category){
            if($category != '*'){
                $products = Produit::orderBy('name', "desc")->where('category_id','=', $category )->cursorPaginate(5);
            }
        }


        $categories = Category::orderBy('name', "desc")->get();



        return view('product.search', ['products'=>$products, 'categories'=>$categories,  'search'=>$search, 'category_id'=>$category]);
    }

    public function create() {
        $categories = Category::orderBy('name', 'desc')->get();
        return view('product.create', ['categories'=>$categories]);
    }

    public function show($id) {
        $product = Produit::findOrFail($id);
        return view('product.show', ['product'=> $product]);
    }

    public function store() {

        request()->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|min:3',
            'price' => 'required',
            'quantity' => 'required',
            'quantity_type' => 'required',
            'category' => 'required',
       ]);
       if (request()->hasFile('image')) {
            $product = new Produit();
            $imgFile = request()->file('image');
            $img = Image::make($imgFile);
            $img->resize(200 ,200);
            $product->image = substr($imgFile->store('public/assets/images'),7);
            $fileName = substr($product->image,19);
            Storage::disk('local')->put('public/assets/thumbs/'.$fileName, $img,'public');
            $product->thumbnail = 'assets/thumbs/'.$fileName;
            $product->name = request('name');
            $product->description = request('description');
            $product->price = request('price');
            $product->quantity = request('quantity');
            $product->quantity_type = request('quantity_type');
            $product->category_id = request('category');
            $product->user_id = Auth::id();
            $product->save();
       }
        return redirect('/');
    }

    public function edit($id) {
        $product = Produit::findOrFail($id);
        $categories = Category::orderBy('name')->get();
        return view('product.edit', ['product'=> $product, 'categories'=>$categories]);
    }

    public function update($id) {

        $product = Produit::findOrFail($id);

        if (request('image')){
            $imgFile = request()->file('image');
            $img = Image::make($imgFile);
            $img->resize(200 ,200);
            $product->image = substr($imgFile->store('public/assets/images'),7);
            $fileName = substr($product->image,19);
            Storage::disk('local')->put('public/assets/thumbs/'.$fileName, $img,'public');
            $product->thumbnail = 'assets/thumbs/'.$fileName;
        }

        $product->name = request('name');
        $product->description = request('description');
        $product->price = request('price');
        $product->quantity = request('quantity');
        $product->quantity_type = request('quantity_type');
        $product->category_id = request('category');

        $product->update();
        return redirect('/product/' . $id );
    }

    public function destroy($id) {
        $product = Produit::findOrFail($id);
        $product->delete();
        return redirect('/');
    }

}
