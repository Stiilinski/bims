<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class epiRecord_tbl extends Model
{
    protected $table = 'epi_record_tbls';
    protected $primaryKey = 'epi_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function mother()
    {
        return $this->belongsTo(resident_tbl::class, 'mother_id', 'res_id');
    }
    public function father()
    {
        return $this->belongsTo(resident_tbl::class, 'father_id', 'res_id');
    }

    use HasFactory;
}
