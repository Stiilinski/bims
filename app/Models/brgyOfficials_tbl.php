<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brgyOfficials_tbl extends Model
{
    protected $table = 'brgy_officials_tbls';
    protected $primaryKey = 'of_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function resident()
    {
        return $this->belongsTo(resident_tbl::class, 'res_id', 'res_id');
    }
    use HasFactory;
}
