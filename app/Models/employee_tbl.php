<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employee_tbl extends Model
{
    use HasFactory;
    protected $table = 'employee_tbls';
    protected $primaryKey = 'em_id';
    public $incrementing = false; // If your primary key is not an auto-incrementing integer
    protected $keyType = 'string'; // If your primary key is a string
}
