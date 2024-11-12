<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class antepartum_tbl extends Model
{
    protected $table = 'antepartum_tbls';
    protected $primaryKey = 'ap_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function ap()
    {
        return $this->belongsTo(maternal_tbl::class, 'mat_id', 'mat_id');
    }
    use HasFactory;
}
