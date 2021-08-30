<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UserMultiSheetExport implements WithMultipleSheets
{
    private $user;
    public function __construct(int $user)
    {
        $this->user = $user;
    }

    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new UsersExport($this->user);

        return $sheets;
    }
}
