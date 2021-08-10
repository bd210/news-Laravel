<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Scout\Searchable;

class User extends Authenticatable
{
    use HasFactory, Notifiable, Searchable;

    protected $table = "users";


    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role_id'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public static $searchable = [
        'first_name',
        'last_name',
        'email'
    ];




    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

}
