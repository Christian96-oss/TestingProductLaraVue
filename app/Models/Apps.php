<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apps extends Model
{
    use HasFactory;
    protected $table = 'mst_apps';
    protected $fillable = [
        'apps',
        'user_id',
    ];
}
