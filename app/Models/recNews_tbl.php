<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recNews_tbl extends Model
{
    protected $table = 'rec_news_tbls';
    protected $primaryKey = 'rec_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function employee()
    {
        return $this->belongsTo(employee_tbl::class, 'em_id', 'em_id');
    }
    use HasFactory;
}
