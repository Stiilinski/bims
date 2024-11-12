<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class delbirth_tbl extends Model
{
    protected $table = 'delbirth_tbls';
    protected $primaryKey = 'db_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function maternal()
    {
        return $this->belongsTo(maternal_tbl::class, 'mat_id', 'mat_id');
    }
    use HasFactory;
}
