<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Resources\OrderResource;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(OrderRequest $request)
    {
//        dd(Order::query()->with(['paymentMethod','orderDtails','shipMethod','customer','staff'])->paginate(10));
        return $this->respondSuccess(
            new OrderCollection(Order::query()->with(['paymentMethod','shipMethod','customer','staff'])->paginate(10))
        );
    }

    public function store(OrderRequest $request)
    {
        return $this->respondCreated(
            new OrderResource(Order::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function show(OrderRequest $request, Order $Order)
    {
        return $this->respondSuccess(new OrderResource($Order));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function update(OrderRequest $request, Order $Order)
    {
        $Order->fill($request->validated())->save();
        return $this->respondSuccess(new OrderResource($Order));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderRequest $request, Order $Order)
    {
        if ($Order->delete()) {
            return $this->respondOk(__('trans.delete_success', ['resource','danh mục '.$Order->name]));
        }
        return $this->respondError(__('trans.delete_fail', ['resource','danh mục '.$Order->name]));
    }

}


