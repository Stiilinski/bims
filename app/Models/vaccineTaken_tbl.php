<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vaccineTaken_tbl extends Model
{
    protected $table = 'vaccine_taken_tbls';
    protected $primaryKey = 'vt_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function epi()
    {
        return $this->belongsTo(epiRecord_tbl::class, 'epi_id', 'epi_id');
    }

    use HasFactory;
}
