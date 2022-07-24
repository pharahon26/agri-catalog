<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::orderBy("name", "desc")->cursorPaginate(10);
        return view('category.index', ['categories'=>$categories]);
    }

    public function search()
    {
        $categories = Category::orderBy("name", "desc")->cursorPaginate(10);
        $search = request('search');

        if ($search){
            $categories = Category::orderBy('name', "desc")->where('name','LIKE', '%' . $search .'%')->cursorPaginate(10);
        }


        return view('category.search', ['categories'=>$categories,  'search'=>$search]);
    }

    public function create() {

        return view('category.create');
    }

    // public function show($id) {
    //     $category = Category::findOrFail($id);
    //     return view('category.show', ['category'=> $category]);
    // }

    public function store() {

        $category = new Category();
        $category->name = request('name');
        $category->description = request('description');
        $category->user_id = Auth::id();
        $category->save();

        return redirect('/category');
    }

    public function edit($id) {

        $category = Category::findOrFail($id);
        return view('category.edit', ['category'=> $category]);
    }

    public function update($id) {

        $category = Category::findOrFail($id);
        $category->name = request('name');
        $category->description = request('description');
        $category->save();

        return redirect('/category');
    }

    public function destroy($id) {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect('/category');
    }
}
