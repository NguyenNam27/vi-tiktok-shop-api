<?php

namespace App\Http\Controllers\APi\V1;

use App\Models\Warehouse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Http\Resources\WarehouseResource;
use App\Http\Resources\WarehouseCollection;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(WarehouseRequest $request)
    {
        return $this->respondSuccess(
            new WarehouseCollection(
                Warehouse::query()->paginate()->appends($request->all())
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseRequest $request)
    {
        return $this->respondCreated(
            new WarehouseResource(Warehouse::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(WarehouseRequest $request,Warehouse $warehouse)
    {
        return $this->respondSuccess(
            new WarehouseResource($warehouse)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(WarehouseRequest $request, Warehouse $warehouse)
    {
        $warehouse->fill($request->validated())->save();
        return $this->respondSuccess(new WarehouseResource($warehouse));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarehouseRequest $request,Warehouse $warehouse)
    {
        if ($warehouse->delete()) {
            return $this->respondOk(__('trans.delete_success',['resource',  'kho '.$warehouse->name]));
        }
        return $this->respondError(__('trans.delete_fail',['resource',  'kho '.$warehouse->name]));
    }
}
