<?php

namespace App\Exports;

use App\Models\ApplicationForm;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Collection;

class ApplicationsExport implements FromCollection, WithHeadings
{
    protected $status;

    public function __construct($status = null)
    {
        $this->status = $status;
    }

    /**
     * Fetch the collection of application data for export.
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection(): Collection
    {
        $query = ApplicationForm::select('id', 'first_name', 'middle_name', 'last_name', 'status', 'remarks');
        
        if ($this->status) {
            if ($this->status === 'pending') {
                $query->where('status', 'pending');
            } elseif ($this->status === 'accepted') {
                $query->where('status', 'like', '%accepted%');
            } elseif ($this->status === 'rejected') {
                $query->where('status', 'like', '%rejected%');
            }
        }
        
        return $query->get();
    }

    /**
     * Define the column headings for the exported file.
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'First Name',
            'Middle Name',
            'Last Name',
            'Status',
            'Remarks',
        ];
    }
}
