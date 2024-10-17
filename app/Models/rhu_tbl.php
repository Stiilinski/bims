<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rhu_tbl extends Model
{
    protected $table = 'rhu_tbls';
    protected $primaryKey = 'rhu_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function resident()
    {
        return $this->belongsTo(resident_tbl::class, 'res_id', 'res_id');
    }
    use HasFactory;
}
