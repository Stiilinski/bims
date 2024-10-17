<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class opt_tbl extends Model
{
    protected $table = 'opt_tbls';
    protected $primaryKey = 'opt_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function resident()
    {
        return $this->belongsTo(resident_tbl::class, 'res_id', 'res_id'); // Assuming 'res_id' is the foreign key in `opt_tbl`
    }
    use HasFactory;
}
