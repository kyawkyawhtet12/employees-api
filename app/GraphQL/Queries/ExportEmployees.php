<?php declare(strict_types=1);

namespace App\GraphQL\Queries;

use App\Models\Employee;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use Illuminate\Support\Facades\Storage;


final readonly class ExportEmployees
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $fileName = 'employees_' . now()->timestamp . '.xlsx';
        $filePath = 'exports/' . $fileName;

        Excel::store(new EmployeesExport, $filePath, 'public');

        return Storage::url($filePath);

    }
}