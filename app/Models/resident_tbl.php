<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class resident_tbl extends Model
{
    use HasFactory;

    protected $primaryKey = 'res_id';

    protected $table = 'resident_tbls';

    protected $fillable = [
        'res_fname',      // First name
        'res_mname',      // Middle name
        'res_lname',      // Last name
        'res_suffix',     // Suffix
        'res_bdate',      // Birthdate
        'res_contact',    // Contact number
        'res_address',    // Address
        'res_picture',    // Picture path
        'res_household',  // Household ID
        'res_dateReg',    // Date of registration
        'res_nationalId', // National ID
        'res_bplace',     // Birthplace
        'res_civil',      // Civil status
        'res_religion',   // Religion
        'res_sex',        // Sex
        'res_educ',       // Education
        'res_purok',      // Purok
        'res_sitio',      // Sitio
        'res_voters',     // Voter's status
        'res_email',      // Email
        'res_otherContact', // Other contact number
        'res_citizen',    // Citizenship
        'res_tempAddress', // Temporary address
        'res_occupation',  // Occupation
        'res_personStatus', // Personal status
        'res_status',     // Status
    ];
}
