<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }
    public function login_proses(Request $request){
        // dd($request->all());
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            
        ]);
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)){
            return redirect('admin/dashboard');
        }else{
            return redirect('/login');
        }

    }

    public function logout(){
        // dd('oke');
        Auth::logout();
        return redirect('login');
    }

    public function register(){
        return view('login.register');
    }

    public function register_proses(Request $request){
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            
        ]);
        $data ['name'] = $request->name;
        $data ['email'] = $request->email;
        $data ['password'] = Hash::make($request->password);

        User::create($data);
        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)){
            return redirect('admin/dashboard');
        }else{
            return redirect('/login');
        }
            
        // return view('login.register');
    }
}
