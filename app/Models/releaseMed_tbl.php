<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class releaseMed_tbl extends Model
{
    protected $table = 'release_med_tbls';
    protected $primaryKey = 'rmed_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function medicine()
    {
        return $this->belongsTo(medicine_tbl::class, 'med_id', 'med_id'); 
    }
    public function dsr()
    {
        return $this->belongsTo(dailyServiceRec_tbl::class, 'dsr_id', 'dsr_id'); 
    }
    use HasFactory;
}
