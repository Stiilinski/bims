<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destrict_tbl extends Model
{
    protected $table = 'destrict_tbls';
    protected $primaryKey = 'des_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function resident()
    {
        return $this->belongsTo(resident_tbl::class, 'res_id', 'res_id');
    }
    public function employee()
    {
        return $this->belongsTo(employee_tbl::class, 'em_id', 'em_id');
    }
    use HasFactory;
}
