<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListTask extends Model {
    use HasFactory;
    protected  $primaryKey = 'id';
    protected $table = 'list_task';
    public $timestamps = true;
    protected $fillable = [];
    protected $guarded = [];


}
