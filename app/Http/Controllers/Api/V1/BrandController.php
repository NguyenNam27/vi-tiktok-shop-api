<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandRequest;
use App\Http\Resources\BrandResource;
use App\Http\Resources\BrandCollection;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(BrandRequest $request)
    {
        return $this->respondSuccess(
            new BrandCollection(Brand::query()->paginate()->appends($request->all()))
        );
    }
    public function store(BrandRequest $request)
    {
        return $this->respondCreated(
            new BrandResource(Brand::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function show(BrandRequest $request, Brand $Brand)
    {
        return $this->respondSuccess(new BrandResource($Brand));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, Brand $Brand)
    {
        $Brand->fill($request->validated())->save();
        return $this->respondSuccess(new BrandResource($Brand));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $Brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(BrandRequest $request, Brand $Brand)
    {
        if ($Brand->delete()) {
            return $this->respondOk(__('trans.delete_success', ['resource','danh mục '.$Brand->name]));
        }
        return $this->respondError(__('trans.delete_fail', ['resource','danh mục '.$Brand->name]));
    }
}
