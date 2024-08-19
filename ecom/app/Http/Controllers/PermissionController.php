<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
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
    // Directly use the request data without validation
    Permission::create([
        'name' => $request->input('name')
    ]);

    // Redirect back with a success message
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
    public function givePermissionToRole (Request $request, $roleId)
    {
        $request->validate([
            'permission' => 'required',

        ]);
        $role = Role::findOrFail($roleId);
        $role->syncPermissions($request->permissions);

        return redirect()->back()->with('status','Permissions added to role');
    }

    public function addPermissionToRole($roleId)
{
    $permissions = Permission::all();
    $role = Role::findOrFail($roleId);

    // Use the built-in method to get assigned permissions
    $rolePermissions = $role->permissions->pluck('id')->toArray();

    $cats = Category::all(); // Retrieve categories from the database

    return view('role-permission.role.add-permissions', [
        'role' => $role,
        'cats' => $cats,
        'permissions' => $permissions,
        'rolePermissions' => $rolePermissions
    ]);
}

}
