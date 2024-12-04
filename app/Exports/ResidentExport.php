<?php

namespace App\Exports;

use App\Models\resident_tbl;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResidentExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return resident_tbl::select(
            'res_fname',
            'res_mname',
            'res_lname',
            'res_suffix',
            'res_bdate',
            'res_contact',
            'res_address',
            'res_picture',
            'res_household',
            'res_dateReg',
            'res_nationalId',
            'res_bplace',
            'res_civil',
            'res_religion',
            'res_sex',
            'res_educ',
            'res_purok',
            'res_sitio',
            'res_voters',
            'res_email',
            'res_otherContact',
            'res_citizen',
            'res_tempAddress',
            'res_occupation',
            'res_personStatus',
            'res_status'
        )->get();
    }

    public function headings(): array
    {
        return [
            'first_name',
            'middle_name',
            'last_name',
            'suffix',
            'birth_date',
            'contact',
            'address',
            'profile_picture',
            'household',
            'date_registered',
            'national_id',
            'birth_place',
            'civil_status',
            'religion',
            'sex',
            'educational_attainment',
            'purok',
            'sitio',
            'voter_status',
            'email',
            'other_contact',
            'citizenship',
            'temporary_address',
            'occupation',
            'personal_status',
            'status',
        ];
    }

}
