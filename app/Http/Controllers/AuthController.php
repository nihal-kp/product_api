<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function signup(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required',
        ]);
        $user = new User;
        $user->name = $req->name;
        $user->email = $req->email;
        $user->password = Hash::make($req->password); 
        $user->save();
        return '<script>
                    alert("Registration successfully completed!! Please login to your account"); 
                    window.location.href="/";
                </script>';
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $req)
    {
        $this->validate($req, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);
        if (!$user = Auth::attempt($req->only('email', 'password')))
        {
            return '<script>
                        alert("Incorrect email or password!!"); 
                        window.location.href="/";
                    </script>';
        }
        return redirect('products');
    }
}
