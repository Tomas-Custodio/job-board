<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller {

    public function create() {

        return view('auth.Signin.create');

    }

    public function store(Request $request) {

         $dados = $request->validate([

            'name' => "required|string",
            'email' => "required|string",
            "password" =>'required|string'
        ]);

        $newuser = User::create($dados);

        return redirect()->back()->with('msg', 'new user created');
    }

    public function login(){

        return view('auth.Login.view');
    }

    public function login_store(Request $request){

        $dados = $request->validate([

            'email' => "required|string",
            "password" =>'required|string'
        ]);

       if ( Auth::attempt($dados) ) {

            $request->session()->regenerate();
            return redirect()->route('jobs.index')->with('msg', 'Login realizado com sucesso');

        }

        else{
             return redirect()->back()->with('msg', 'credenciais errados!');
        }

    }

    public function destroy(Request $request) {
        
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerate();
        $request->session()->regenerateToken();

        return redirect()->route('jobs.index')->with('msg', 'Sessão terminada com êxito!');
    }




}