<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionRoleController extends Controller
{
    protected $role, $permission;
    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

        $this->middleware('can:roles');
    }

    
    public function permissions($idRole){
        $role = $this->role->with('permissions')->find($idRole);
        
        if(!$role)
            return redirect()->back();
        
        return view('admin.pages.roles.permissions.permissions', compact('role'));
    }

    public function roles($idPermission){
        if(!$permission = $this->permission->find($idPermission))
            return redirect()->back();

        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', compact('permission', 'roles'));
    }

    public function permissionsAvailable($idRole){
        if(!$role = $this->role->with('permissions')->find($idRole))
            return redirect()->back();

        $permissions = $role->permissionsAvailable();

        return view('admin.pages.roles.permissions.available', compact('role', 'permissions'));
    }


    public function attachPermissionRole(Request $request, $idRole){
        $error = 'Precisa escolher pelo menos uma permissão';
        if(!$role = $this->role->with('permissions')->find($idRole))
            return redirect()->back();

        if(!$request->permissions || count($request->permissions) == 0)
            return redirect()->back()->with('error');

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id);
    }

    public function detachPermissionRole($idRole, $idPermission){
        $role = $this->role->find($idRole);
        $permission = $this->permission->find($idPermission);

        if(!$role || !$permission)
            return redirect()->back();

        $role->permissions()->detach($permission);
        return redirect()->route('roles.permissions', $role->id);
    }
}
