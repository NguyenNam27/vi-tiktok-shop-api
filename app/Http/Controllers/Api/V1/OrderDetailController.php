<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderDetailRequest;
use App\Http\Resources\OrderDetailCollection;
use App\Http\Resources\OrderDetailResource;
use App\Models\OrderDetail;

class OrderDetailController extends Controller
{
    public function index(OrderDetailRequest $request)
    {
        return $this->respondSuccess(
            new OrderDetailCollection(OrderDetail::query()->paginate()->appends($request->all()))
        );
    }


    public function store(OrderDetailRequest $request)
    {
        return $this->respondCreated(
            new OrderDetailResource(OrderDetail::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $OrderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetailRequest $request, OrderDetail $orderdetail)
    {

        return $this->respondSuccess(new OrderDetailResource($orderdetail));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrderDetail  $OrderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(OrderDetailRequest $request, OrderDetail $orderdetail)
    {
        $orderdetail->fill($request->validated())->save();
        return $this->respondSuccess(new OrderDetailResource($orderdetail));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $OrderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetailRequest $request, OrderDetail $orderdetail)
    {
        if ($orderdetail->delete()) {
            return $this->respondOk(__('trans.delete_success', ['resource','danh mục '.$orderdetail->name]));
        }
        return $this->respondError(__('trans.delete_fail', ['resource','danh mục '.$orderdetail->name]));
    }
}
