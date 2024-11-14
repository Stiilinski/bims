<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrgyClearance_tbl extends Model
{
    use HasFactory;
    protected $table = 'brgy_clearance_tbls';
    protected $primaryKey = 'bcl_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function resident()
    {
        return $this->belongsTo(resident_tbl::class, 'res_id', 'res_id');
    }
}
