<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blotter_tbl extends Model
{
    use HasFactory;
    protected $table = 'blotter_tbls';
    protected $primaryKey = 'blotter_id';
}
