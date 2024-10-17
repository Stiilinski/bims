<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction_tbl extends Model
{
    use HasFactory;
    protected $table = 'transaction_tbls'; // Adjust if table name is different
    protected $primaryKey = 'tr_id'; // Specify the primary key column
}
