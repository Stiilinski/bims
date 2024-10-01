<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class medicine_tbl extends Model
{
    protected $table = 'medicine_tbls';
    protected $primaryKey = 'med_id';
    public $incrementing = true; 
    protected $keyType = 'int'; 
}