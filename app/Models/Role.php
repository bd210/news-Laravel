<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;
    protected $table = "roles";
    protected $fillable = ['role_name'];



    public function users()
    {

        return $this->hasMany(User::class, 'role_id', 'id');

    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_roles', 'role_id', 'permission_id');
    }

}
