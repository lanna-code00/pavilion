<?php

namespace App\Models;

use App\Traits\PaginateDataTrait;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasUlids, Notifiable, PaginateDataTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'primary_legal_counsel',
        'dob',
        'date_profiled',
        'profile_image',
        'case_details',
        'is_active',
        'meta'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'dob' => 'datetime',
        'is_active' => 'boolean'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

    public function getDobAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

    public function getDateProfiledAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y');
    }

}
