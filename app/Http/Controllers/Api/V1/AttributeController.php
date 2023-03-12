<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Http\Resources\AttributeResource;

use App\Http\Resources\AttributeValueResource;
use App\Http\Resources\AttributeCollection;
use App\Models\Attribute;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AttributeRequest $request)
    {
        return $this->respondSuccess(new AttributeCollection (
            Attribute::query()->paginate()->appends($request->all())
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributeRequest $request)
    {
        return $this->respondCreated(
            new AttributeResource(Attribute::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function show(AttributeRequest $request, Attribute $attribute)
    {
        return $this->respondSuccess(
            new AttributeResource($attribute)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function update(AttributeRequest $request, Attribute $attribute)
    {
        $attribute->fill($request->validated())->save();
        return $this->respondSuccess(new AttributeResource($attribute));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeRequest $request, Attribute $attribute)
    {
        if ($attribute->delete()) {
            return $this->respondOk(__('trans.delete_success',['resource',  'thuộc tính '.$attribute->name]));
        }
        return $this->respondError(__('trans.delete_fail',['resource',  'thuộc tính '.$attribute->name]));
    }

    public function attributeValues(AttributeRequest $request, Attribute $attribute)
    {
        return $this->respondSuccess(
            AttributeValueResource::collection($attribute->attributeValues())
        );
    }
}
