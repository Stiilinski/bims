<?php

namespace App\Imports;

use App\Models\resident_tbl;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ResidentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function model(array $row)
    {
        return new resident_tbl([
            'res_fname' => $row['first_name'], 
            'res_mname' => $row['middle_name'], 
            'res_lname' => $row['last_name'],
            'res_suffix' => $row['suffix'],
            'res_bdate' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['birth_date']), 
            'res_contact' => $row['contact' ],
            'res_address' => $row['address' ],
            'res_picture' => $row['profile_picture' ],
            'res_household' => $row['household'],
            'res_dateReg' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['date_registered']), 
            'res_nationalId' => $row['national_id'],
            'res_bplace' => $row['birth_place'],
            'res_civil' => $row['civil_status'],
            'res_religion' => $row['religion'],
            'res_sex' => $row['sex'],
            'res_educ' => $row['educational_attainment'],
            'res_purok' => $row['purok'],
            'res_sitio' => $row['sitio'],
            'res_voters' => $row['voter_status'],
            'res_email' => $row['email'],
            'res_otherContact' => $row['other_contact'],
            'res_citizen' => $row['citizenship'],
            'res_tempAddress' => $row['temporary_address'],
            'res_occupation' => $row['occupation'],
            'res_personStatus' => $row['personal_status'],
            'res_status' => $row['status'],
        ]);
    }
}
