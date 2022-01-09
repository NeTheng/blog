<?php

namespace App\Exports;

use App\Models\District;
use App\Models\Province;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Excel;
use Illuminate\Contracts\Support\Responsable;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromQuery;

class DistrictExport implements FromCollection, Responsable, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;


    /**
     * It's required to define the fileName within
     * the export class when making use of Responsable.
     */
    private $fileName = 'district.xlsx';

    /**
     * Optional Writer Type
     */
    private $writerType = Excel::XLSX;

    /**
     * Optional headers
     */
    private $headers = [
        'Content-Type' => 'text/csv',
    ];

    public function collection()
    {
        return District::all();
    }

    public function headings(): array
    {
        return ["No.", "Province", "District", "Created At"];
    }

}
