<?php

namespace App\Http\Controllers;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use App\Models\Category;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        $cats = Category::all(); // Retrieve categories from the database
        return view('role-permission.role.index', compact('cats', 'roles'));
    }

    public function create()
    {
        $cats = Category::all(); // Retrieve categories from the database
        return view('role-permission.role.create', compact('cats'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:roles,name'
            ]
            ]);
            Role::create([
                'name'=>$request->name
            ]);
        return redirect('roles')->with('status', 'Role Created Successfully');
    }

    public function edit(Role $role)
    {
        $cats = Category::all(); // Retrieve categories from the database
        return view('role-permission.role.edit', [
            'role' => $role,
            'cats' => $cats
        ]);
    }



    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name'=>[
                'required',
                'string',
                'unique:roles,name,'.$role->id
            ]
            ]);
            $role->update([
                'name'=>$request->name
            ]);
        return redirect('roles')->with('status', 'Role Update Successfully');
    }

    public function destroy($roleId)
    {
        $role = Role::find($roleId);
        $role->delete();
        return redirect('permissions')->with('status', 'Role Deleted Successfully');
    }

    public function addPermissionToRole($roleId)
    {
        $permissions = Permission::get();
        $role = Role::findOrFail($roleId);
        $cats = Category::all(); // Retrieve categories from the database
        return view('role-permission.role.add-permissions', [
            'role' => $role,
            'cats' => $cats,
            'permissions' => $permissions,
        ]);
    }
}
