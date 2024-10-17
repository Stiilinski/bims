<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dailyServiceRec_tbl extends Model
{
    protected $table = 'daily_service_rec_tbls';
    protected $primaryKey = 'dsr_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function resident()
    {
        return $this->belongsTo(resident_tbl::class, 'res_id', 'res_id');
    }
    public function medicine()
    {
        return $this->belongsTo(medicine_tbl::class, 'med_id', 'med_id');
    }
    use HasFactory;
}
