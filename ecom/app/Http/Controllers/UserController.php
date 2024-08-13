<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function index()
    {

        $cats = Category::all();
        $users = User::get();
        return view('role-permission.user.index', compact('cats', 'users'));
    }
    public function create()
{
    $roles = Role::get();
    $cats = Category::all();
    return view('role-permission.user.create', compact('cats', 'roles'));
}


public function store(Request $request)
{
    $request->validate([
        'name'=>'required|string|max:255',
        'email'=>'required|email|max:255|unique:users,email',
        'password'=>'required|string|min:8|max:20',
        'roles' => 'required'
    ]);

    $user = User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>Hash::make($request->password)
    ]);

    $user->syncRoles($request->roles);

    return redirect('users')->with('status', 'User Created Successfully With Role');
}

}
