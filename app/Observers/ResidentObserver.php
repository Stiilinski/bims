<?php

namespace App\Observers;

use App\Models\resident_tbl;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ResidentExport;
use Illuminate\Support\Facades\Storage;

class ResidentObserver
{
    public function saved(resident_tbl $resident)
    {
        $fileName = 'backups/residents_backup_' . now()->format('Y_m_d_His') . '.xlsx';

        // Automatically store the backup when a record is created or updated
        Excel::store(new ResidentExport, $fileName, 'local');
    }

    public function deleted(resident_tbl $resident)
    {
        $fileName = 'backups/residents_backup_' . now()->format('Y_m_d_His') . '.xlsx';

        // Automatically store the backup when a record is deleted
        Excel::store(new ResidentExport, $fileName, 'local');
    }
}
