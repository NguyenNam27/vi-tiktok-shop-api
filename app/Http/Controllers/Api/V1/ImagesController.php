<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImagesRequest;
use App\Http\Resources\ImagesCollection;
use App\Http\Resources\ImagesResource;
use App\Models\Images;

class ImagesController extends Controller
{
    public function index(ImagesRequest $request)
    {
        return $this->respondSuccess(
            new ImagesCollection(Images::query()->paginate()->appends($request->all()))
        );
    }


    public function store(ImagesRequest $request)
    {
        return $this->respondCreated(
            new ImagesResource(Images::create($request->validated()))
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Images  $image
     * @return \Illuminate\Http\Response
     */
    public function show(ImagesRequest $request, Images $image)
    {
        return $this->respondSuccess(new ImagesResource($image));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Images  $image
     * @return \Illuminate\Http\Response
     */
    public function update(ImagesRequest $request, Images $image)
    {
        $image->fill($request->validated())->save();
        return $this->respondSuccess(new ImagesResource($image));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Images  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImagesRequest $request, Images $image)
    {
        if ($image->delete()) {
            return $this->respondOk(__('trans.delete_success', ['resource','danh mục '.$image->name]));
        }
        return $this->respondError(__('trans.delete_fail', ['resource','danh mục '.$image->name]));
    }
}
