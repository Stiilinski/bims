<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fpSideB_tbl extends Model
{
    protected $table = 'fp_side_b_tbls';
    protected $primaryKey = 'sideB_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function fp()
    {
        return $this->belongsTo(fp_tbl::class, 'fp_id', 'fp_id'); // Assuming 'res_id' is the foreign key in `opt_tbl`
    }
    public function employee()
    {
        return $this->belongsTo(employee_tbl::class, 'em_id'); // Make sure 'em_id' is the correct foreign key
    }
    use HasFactory;
}
