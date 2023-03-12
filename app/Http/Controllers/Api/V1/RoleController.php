<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Role;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;

class RoleController extends Controller
{
    /**
     * Display a listing of the role.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(RoleRequest $request)
    {
        return $this->respondSuccess(
            RoleResource::collection(Role::all())
        );
    }

    /**
     * Store a newly created role in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        return $this->respondCreated(
            $request->all()
        );
    }

    /**
     * Display the specified role.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(RoleRequest $request, Role $role)
    {
        return $this->respondSuccess(
            new RoleResource($role)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(RoleRequest $request, Role $role)
    {
        //
    }
}
