<?php

namespace App\Exports;
use App\Exports\UserMultiSheetExport;
use App\Models\User;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromQuery;

class UsersExport implements FromQuery, WithTitle
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $id;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    // public function collection()
    // {

    //     return User::find($this->id);
     
    // }

    public function query()
    {

        return User
            ::query()
            ->where('id', $this->id);
            
    }

    public function title(): string
    {
        return $this->id;
    }
}
