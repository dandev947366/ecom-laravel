<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();
        $cats = Category::all(); // Retrieve categories from the database
        return view('role-permission.permission.index', compact('cats', 'permissions'));
    }

    public function create()
    {
        $cats = Category::all(); // Retrieve categories from the database
        return view('role-permission.permission.create', compact('cats'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:permissions,name'
            ]
            ]);
            Permission::create([
                'name'=>$request->name
            ]);
        return redirect('permissions')->with('status', 'Permission Created Successfully');
    }

    public function edit(Permission $permission)
    {
        $cats = Category::all(); // Retrieve categories from the database
        return view('role-permission.permission.edit', [
            'permission' => $permission,
            'cats' => $cats
        ]);
    }



    public function update(Request $request, Permission $permission)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:permissions,name,'.$permission->id
            ]
            ]);
            $permission->update([
                'name'=>$request->name
            ]);
        return redirect('permissions')->with('status', 'Permission Update Successfully');
    }

    public function destroy($permissionId)
    {
        $permission = Permission::find($permissionId);
        $permission->delete();
        return redirect('permissions')->with('status', 'Permission Deleted Successfully');
    }
}
