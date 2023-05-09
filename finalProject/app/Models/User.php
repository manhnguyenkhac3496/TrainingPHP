<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = ["user_name", "password",'email'];
    protected $guarded = [];

}
