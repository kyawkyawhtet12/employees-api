<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class EmployeesExport implements FromQuery, WithHeadings, WithChunkReading
{
    public function query()
    {
        return Employee::query();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Email',
            'Position',
            'Salary',
            'Created At',
            'Updated At'
        ];
    }


    public function chunkSize(): int
    {
        return 1000; // Adjust based on your needs
    }
}