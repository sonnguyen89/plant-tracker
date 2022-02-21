<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRoleRequest  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        //
    }

    /**
     * show roles by user id
     *
     * @param  $user_id
     * @return mixed
     */
    public function RolesByUser($user_id)
    {
        $roles= User::find($user_id)->roles()->orderBy('id','desc')->get();

        foreach ($roles as $role) {
            echo $role->name . '<br/>';
        }
    }

    /**
     * show role pivot by user id
     *
     * @return mixed
     */
    public function UserPivot($user_id)
    {
        $user = User::find($user_id);

        foreach ($user->roles as $role) {
            echo $role->pivot->role_id . '  '. $role->pivot->created_at . '<br/>';
        }
    }


    /**
     * show Users  by Role id
     *
     * @return mixed
     */
    public function UsersByRole($role_id)
    {
        $role = Role::find($role_id);

        foreach ($role->users as $user) {
            echo $user->pivot . '<br/>';
            echo $user->pivot->user_id . '  '. $user->pivot->created_at . '<br/>';
        }
    }

}
