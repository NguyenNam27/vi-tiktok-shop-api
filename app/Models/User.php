<?php

namespace App\Models;

use App\Enums\UserTypesEnum;
use Spatie\Activitylog\LogOptions;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable, SoftDeletes;
    use LogsActivity, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'phone', 'first_name', 'last_name', 'user_type', 'gender', 'date_of_birth',
        'status', 'is_user_banned', 'newsletter_enable', 'otp', 'firebase_auth_id', 'is_password_set',
        'password', 'images', 'socials', 'last_login', 'balance',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at'     => 'datetime',
        'images'                => 'array',
        'socials'               => 'array',
        'user_type'             => UserTypesEnum::class,
        'date_of_birth'         => 'date',
    ];

    protected $attributes = [
        'images'                => '[]',
        'socials'               => '[]',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['last_login']);
        // Chain fluent methods for configuration options
    }

    public function getRules()
    {
        return [
            'email' => ['nullable'],
            'phone' => ['nullable'],
            'first_name' => ['nullable', 'string', 'max:50'],
            'last_name' => ['nullable', 'string', 'max:50'],
            'user_type' => ['nullable', 'enum:'.UserTypesEnum::class],
            'gender' => ['nullable', 'string', 'max:50'],
            'date_of_birth' => ['nullable', 'date'],
            'status' => ['required', 'integer', 'min:0'],
            'is_user_banned' => ['required', 'integer', 'min:0'],
            'newsletter_enable' => ['required', 'integer', 'min:0'],
            'otp' => ['nullable', 'integer'],
            'firebase_auth_id' => ['nullable', 'string'],
            'is_password_set' => ['required', 'integer'],
            'images' => ['nullable', 'array'],
            'socials' => ['nullable', 'array'],
            'last_login' => ['nullable'],
            'balance' => ['nullable'],
        ];
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'id'              => $this->id,
            'name'            => $this->name,
            'email'           => $this->email,
            'created_at'      => $this->created_at,
            'updated_at'      => $this->updated_at,
        ];
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class);
    }
    public function order()
    {
        return $this->hasOne(Oder::class);
    }


    public function scopeCustomer($query)
    {
        return $query->where('user_type', (string)UserTypesEnum::customer())
            ->orWhere('user_type', (string)UserTypesEnum::shop())
            ->orWhere('user_type', (string)UserTypesEnum::staff());
    }
}
