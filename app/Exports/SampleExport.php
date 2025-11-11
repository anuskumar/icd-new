<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SampleExport implements FromArray, WithHeadings
{
    public function headings(): array
    {
        return [
            'Firstname',
            'Lastname',
            'Gender',
            'Phone',
            'Email',
            'Password',
            'Password2'
        ];
    }

    public function array(): array
    {
        return [
            ['John', 'Doe', 'Male', '8675665401', 'john@gmail.com', 'password123', 'password123'],
            ['Murphy', 'Cooper', 'Female', '8596547120', 'Murphy@gmail.com', 'murphy321', 'murphy321'],

        ];
    }
}
