<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class maternal_tbl extends Model
{
    protected $table = 'maternal_tbls';
    protected $primaryKey = 'mat_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function maiden()
    {
        return $this->belongsTo(resident_tbl::class, 'maiden_id', 'res_id');
    }
    
    public function husband()
    {
        return $this->belongsTo(resident_tbl::class, 'husband_id', 'res_id');
    }
    use HasFactory;
}
