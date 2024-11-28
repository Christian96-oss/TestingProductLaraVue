<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    use HasFactory;
    protected $table = 'mst_dept';
    protected $fillable = [
        'dept',
        'user_id',
    ];
}
