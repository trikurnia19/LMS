<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleManagement\StoreRolePermissionsRequest;
use App\Http\Requests\RoleManagement\UpdateRolePermissionsRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();
        return view('pages.role.index',compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Role';
        $permissions = Permission::all();
        return view('pages.role.form',compact('title','permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRolePermissionsRequest $request)
    {
        $request = $request->validated();
        $role = Role::create(['name'=> $request['name']]);
        if(isset($request['permissions'])) {
            $role->syncPermissions($request['permissions']);
        }
        return redirect('role');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Update role';
        $role = Role::with('permissions')->find($id);
        $permissions = Permission::all();
        return view('pages.role.form',compact('role','permissions', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRolePermissionsRequest $request, $id)
    {
        $request = $request->validated();
        $role = Role::find($id);
        $role->name = $request['name'];
        $role->syncPermissions($request['permissions']);
        return redirect('role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::find($id);
        if($role != null) {
            $role->delete();
        }
        return redirect('role');
    }
}
