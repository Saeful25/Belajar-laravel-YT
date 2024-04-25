<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class LoginController extends Controller
{
    //
    public function index(){
        return view('auth.login');
    }
    public function login_proses(Request $request){
        
        // var_dump nya laravel
        // dd($request->all());

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // untuk pengecekan login
        if(Auth::attempt($data)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('Failed','Email atau password salah');
        }
    }
    public function logout(){
        // untuk ngecek
        // dd('oke');

        return redirect()->route('login')->with('success','Kamu Berhasil Logout');
    }

    public function register(){
        return view('auth.register');
    }
    public function register_proses(Request $request){
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6'
        ]);

            $data['name'] = $request->nama;
            $data['email'] = $request->email;
            $data['password'] = Hash::make($request->password) ;  

        User::create($data);


        $login = [
            'email' => $request->email,
            'password' => $request->password
        ];

        // untuk pengecekan login
        if(Auth::attempt($login)){
            return redirect()->route('dashboard');
        }else{
            return redirect()->route('login')->with('Failed','Email atau password salah');
        }
        }

}