<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sched_tbl extends Model
{
    protected $fillable = [
        'vt_id',  // Add this
        'sched_desc',
        // any other fields you want to allow for mass assignment
    ];
    use HasFactory;
}
