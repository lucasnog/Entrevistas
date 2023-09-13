<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function createUserView()
    {
        return view('pages.login.login');
    }

    public function createUser(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect()->route('index.user')->with('error', 'Email já utilizado.');
        };
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        $user = User::where('email', $request->email)->first();
        Auth::login($user);
        return redirect()->route('index.categorias')->with('success', 'Conta criada com sucesso!');
    }

    public function userLogin(Request $request)
    {

        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect()->route('index.categorias')->with('success', 'Login realizado com sucesso!');
        }

        return back()->with('error', 'Email ou senha incorreto.');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.user')->with('success', 'Logout realizado com sucesso!');
    }
}
