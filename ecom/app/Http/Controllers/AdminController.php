<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class AdminController extends Controller
{
    public function login(){
        return view('admin.login');
    }
    public function check_login(){
        request()->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required'
        ]);
        $data = request()->all('email','password');

        if (Auth::attempt($data)) {

            return redirect()->route('admin.index');
        }
        return redirect()->back()->withErrors(['login' => 'Invalid credentials. Please try again.']);
    }
    public function register(){
        return view('admin.register');
    }
    public function check_register(){
       request()->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users',
        'password'=>'required',
        'password_confirmation'=>'required|same:password',
]);
       $data = request()->all('email','name','password');
       $data['password'] = bcrypt(request('password'));
       // Create new user
       User::create($data);

       return redirect()->route('admin.login');
    }
    public function index(){
        return view('admin.index');
    }
}
