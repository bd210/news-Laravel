<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyComment extends Model
{
    use HasFactory;

    protected $table = "verify_comments";
    public $timestamps = false;
}
