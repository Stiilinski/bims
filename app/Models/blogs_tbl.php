<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blogs_tbl extends Model
{
    protected $table = 'blogs_tbls';
    protected $primaryKey = 'blog_id';
    public $incrementing = true; 
    protected $keyType = 'int';

    public function author()
    {
        return $this->belongsTo(employee_tbl::class, 'blog_author', 'em_id');
    }
    use HasFactory;
}
