<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fp_tbl extends Model
{
    protected $table = 'fp_tbls';
    protected $primaryKey = 'fp_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function client()
    {
        return $this->belongsTo(resident_tbl::class, 'fp_clientId', 'res_id');
    }
    
    public function spouse()
    {
        return $this->belongsTo(resident_tbl::class, 'fp_spouseId', 'res_id');
    }
    use HasFactory;
}
