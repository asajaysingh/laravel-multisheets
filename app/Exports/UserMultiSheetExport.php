<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\User;

class UserMultiSheetExport implements WithMultipleSheets
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;

    protected $id;
    
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function sheets(): array
    {
        $sheets = [];
        $usr = User::all();
        foreach ($usr as $value) {
            $sheets[] = new UsersExport($value->id); 
        }
        return $sheets;
    }
}
