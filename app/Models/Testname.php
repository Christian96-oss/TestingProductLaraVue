<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testname extends Model
{
    use HasFactory;
    protected $table = 'mst_test_name';
    protected $fillable = [
        'test_name',
        'user_id',
    ];
}
