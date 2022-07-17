<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class ProduitController extends Controller
{
    public function index()
    {
        $products = [
            ["id" => 0, "name"=>"blé", "category"=>"céréales", "price"=>5500, "quantity"=> "15 kg"],
            ["id" => 1, "name"=>"riz", "category"=>"céréales", "price"=>4000, "quantity"=> "10 kg"],
            ["id" => 2, "name"=>"maïs", "category"=>"céréales", "price"=>25000, "quantity"=> "50 kg"],
            ["id" => 3, "name"=>"patate", "category"=>"féculent", "price"=>6500, "quantity"=> "10 kg"],
            ["id" => 4, "name"=>"mangue", "category"=>"fruits", "price"=>2500, "quantity"=> "12 pièces"],
        ];
        return view('product.index', ['products'=>$products]);
    }

    public function show($id) {
        $products = [
            ["id" => 0, "name"=>"blé", "category"=>"céréales", "price"=>5500, "quantity"=> "15 kg"],
            ["id" => 1, "name"=>"riz", "category"=>"céréales", "price"=>4000, "quantity"=> "10 kg"],
            ["id" => 2, "name"=>"maïs", "category"=>"céréales", "price"=>25000, "quantity"=> "50 kg"],
            ["id" => 3, "name"=>"patate", "category"=>"féculent", "price"=>6500, "quantity"=> "10 kg"],
            ["id" => 4, "name"=>"mangue", "category"=>"fruits", "price"=>2500, "quantity"=> "12 pièces"],
        ];
        return view('product.show', ['product'=> $products[$id]]);
    }

    public function create() {

        return view('product.create');
    }

    public function store() {

        $product = new Product();
        $product->image = request('image');
        $product->name = request('name');
        $product->price = request('price');
        $product->quantity = request('quantity');
        $product->quantity = request('quantity_type');
        $product->category_id = request('category');

        $product->save();

        return redirect('/');;
    }

    public function edit($id) {

        return view('product.edit', ['product'=> $products[$id]]);
    }

    public function update() {

        $product = new Product();
        $product->image = request('image');
        $product->name = request('name');
        $product->price = request('price');
        $product->quantity = request('quantity');
        $product->quantity = request('quantity_type');
        $product->category_id = request('category');

        $product->update();

        return redirect('/');;
    }

    public function destroy($id) {

        return redirect('/');
    }

}
