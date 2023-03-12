<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShipMethodRequest;
use App\Http\Resources\ShipMethodCollection;
use App\Http\Resources\ShipMethodResource;
use App\Models\ShipMethod;

class ShipMethodController extends Controller
{
    public function index(ShipMethodRequest $request)
    {
        return $this->respondSuccess(
            new ShipMethodCollection(ShipMethod::query()->paginate()->appends($request->all()))
        );
    }


    public function store(ShipMethodRequest $request)
    {
        return $this->respondCreated(
            new ShipMethodResource(ShipMethod::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShipMethod  $shipmethod
     * @return \Illuminate\Http\Response
     */
    public function show(ShipMethodRequest $request, ShipMethod $shipmethod)
    {
        return $this->respondSuccess(new ShipMethodResource($shipmethod));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipMethod  $shipmethod
     * @return \Illuminate\Http\Response
     */
    public function update(ShipMethodRequest $request, ShipMethod $shipmethod)
    {
        $shipmethod->fill($request->validated())->save();
        return $this->respondSuccess(new ShipMethodResource($shipmethod));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipMethod  $shipmethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShipMethodRequest $request, ShipMethod $shipmethod)
    {
        if ($shipmethod->delete()) {
            return $this->respondOk(__('trans.delete_success', ['resource','danh mục '.$shipmethod->name]));
        }
        return $this->respondError(__('trans.delete_fail', ['resource','danh mục '.$shipmethod->name]));
    }
}
