<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\resident_tbl;

class ResidentSelect extends Component
{
    public $residents;

    public function __construct()
    {
        // Fetch all residents
        $this->residents = resident_tbl::all();
    }

    public function render()
    {
        return view('components.resident-select');
    }
}

