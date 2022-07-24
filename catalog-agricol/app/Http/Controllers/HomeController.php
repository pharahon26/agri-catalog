<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home', ['user' => $user]);
    }

    public function edit(){
        $user = Auth::user();
        return view('user.profil', ['user' => $user]);
    }

    public function update(){
        $user = Auth::user();

        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        return redirect(Route('home'));
    }
}
