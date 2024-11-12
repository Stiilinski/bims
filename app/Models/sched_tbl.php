<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sched_tbl extends Model
{
    protected $fillable = [
        'vt_id',
        'ap_id',
        'pp_id',
        'sideB_id',  // Add this
        'sched_desc',
        // any other fields you want to allow for mass assignment
    ];
    protected $table = 'sched_tbls';
    protected $primaryKey = 'sched_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function vt()
    {
        return $this->belongsTo(vaccineTaken_tbl::class, 'vt_id', 'vt_id');
    }
    public function ap()
    {
        return $this->belongsTo(antepartum_tbl::class, 'ap_id', 'ap_id');
    }
    public function pp()
    {
        return $this->belongsTo(postpartum_tbl::class, 'pp_id', 'pp_id');
    }
    public function sb()
    {
        return $this->belongsTo(fpSideB_tbl::class, 'sideB_id', 'sideB_id');
    }

    use HasFactory;
}
