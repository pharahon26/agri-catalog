<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        request()->validate([
            'password' => 'required|min:8',
            'new_password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'new_password_conf' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|same:new_password',
       ]);

        $user->name = request('name');
        $user->email = request('email');
        $user->save();
        return redirect(Route('home'));
    }

    public function password(){
        return view('user.password');
    }

    public function modifPassword(){
        $this->middleware('password.confirm');
        $user = Auth::user();
        request()->validate([
            'password' => 'required|min:8',
            'new_password' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'new_password_conf' => 'required|min:8|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/|same:new_password',
       ]);

        $newPassword = bcrypt(request('new_password'));
        if (Hash::check(request('password'), $user->password)) {

            if (!Hash::check(request('new_password'), $user->password)) {
                $user->password = $newPassword;
                $user->save();
                session()->flash('message', 'Mot de passe modifié');
                return redirect(Route('home'));
            } else {
                session()->flash('message', 'Mot de passe idendique à l\'ancien');
                return back();
            }

        } else {
            session()->flash('message', 'Mot de passe incorrect ');
            return back();
        }

        return redirect(Route('home'));
    }
}
