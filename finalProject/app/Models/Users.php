<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Users extends Authenticatable
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'users';
    public $timestamps = true;
    protected $fillable = [];
    protected $guarded = [];

}
