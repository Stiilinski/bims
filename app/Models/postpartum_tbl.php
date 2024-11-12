<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postpartum_tbl extends Model
{
    protected $table = 'postpartum_tbls';
    protected $primaryKey = 'pp_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function maternal()
    {
        return $this->belongsTo(maternal_tbl::class, 'mat_id', 'mat_id');
    }
    use HasFactory;
}
