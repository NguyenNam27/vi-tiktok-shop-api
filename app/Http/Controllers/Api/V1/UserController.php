<?php

namespace App\Http\Controllers\Api\V1;

use App\Actions\UserAddRoleAction;
use App\Enums\UserTypesEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use stdClass;

class UserController extends Controller
{
    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(UserRequest $request)
    {
        $user = QueryBuilder::for(User::class)
            ->allowedIncludes(['roles', 'permissions'])
            ->allowedFilters([
                'first_name', 'email', 'phone',
            ])
            ->paginate($request->per_page ?? 10)
            ->appends($request->all());

        return $this->respondSuccess(
            new UserCollection($user)
        );
    }

    /**
     * @param UserRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(UserRequest $request)
    {
        $dataUser = $request->validated();
//        $dataUser['password'] = Hash::make($dataUser['password']);
        $user = new User();
//TODO add role add quyen

        if ($user->fill($dataUser)->save()) {
//            app(UserAddRoleAction::class)->execute($user);
            return $this->respondCreated(new UserResource($user));
        }
        return $this->respondError('Tao moi user that bai');

//        app(UserAddRoleAction::class)->execute();
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(UserRequest $request, User $user)
    {
        return $this->respondSuccess(new UserResource($user));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request,User $user)
    {
        $dataUser = $request->validated();
        $dataUser['password'] = Hash::make($dataUser['password']);
        if ($user->fill($dataUser)->save()){
            return $this->respondSuccess(
                new UserResource($user)
            );
        }
        return $this->respondError('Loi cap nhat User');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserRequest $request, User $user)
    {
        if ($user->delete()) {
            return $this->respondOk(__('trans.delete_success', ['resource', 'User '.$user->name]));
        }
        return $this->respondError(__('trans.delete_fail', ['resource', 'User '.$user->name]));
    }

    public function getUserType(UserRequest $request)
    {
        $types = collect(UserTypesEnum::toValues())->map(function($type){
            return (object) [
                'name' => __('trans.'.$type),
                'value' => $type,
            ];
        });
        return $this->respondSuccess($types);
    }
}
