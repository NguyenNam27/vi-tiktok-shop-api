<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentMethodRequest;
use App\Http\Resources\PaymentMethodCollection;
use App\Http\Resources\PaymentMethodResource;
use App\Models\PaymentMethod;

class PaymentMethodController extends Controller
{
    public function index(PaymentMethodRequest $request)
    {
        return $this->respondSuccess(
            new PaymentMethodCollection(PaymentMethod::query()->paginate()->appends($request->all()))
        );
    }
    public function store(PaymentMethodRequest $request)
    {
        return $this->respondCreated(
            new PaymentMethodResource(PaymentMethod::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        return $this->respondSuccess(new PaymentMethodResource($payment_method));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        $payment_method->fill($request->validated())->save();
        return $this->respondSuccess(new PaymentMethodResource($payment_method));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $payment_method
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethodRequest $request, PaymentMethod $payment_method)
    {
        if ($payment_method->delete()) {
            return $this->respondOk(__('trans.delete_success', ['resource','danh mục '.$payment_method->name]));
        }
        return $this->respondError(__('trans.delete_fail', ['resource','danh mục '.$payment_method->name]));
    }
}
