<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function store(Request $req){
        
        $this->validate($req, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        auth()->attempt($req ->only('email', 'password'));

        return redirect()->route('dashboard');
    }

}