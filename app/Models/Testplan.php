<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testplan extends Model
{
    use HasFactory;
    protected $table = 'test_plan';
    protected $fillable = [
        'tp_id', 'requestor', 'test_name', 'lob', 'family', 'reference', 'qty', 'purpose', 'plan_date', 'detail', 'status'
    ];
}
