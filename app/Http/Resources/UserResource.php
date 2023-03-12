<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'phone' => $this->phone,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'user_type' => $this->user_type,
            'gender' => $this->gender,
            'date_of_birth' => $this->date_of_birth,
            'status' => $this->status,
            'is_user_banned' => $this->is_user_banned,
            'newsletter_enable' => $this->newsletter_enable,
            'firebase_auth_id' => $this->firebase_auth_id,
            'is_password_set' => $this->is_password_set,
            'images' => $this->images,
            'socials' => $this->socials,
            'last_login' => $this->last_login,
            'balance' => $this->balance,
        ];
    }
}
