<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $user = User::create([
                'name' => $row['firstname'] . ' ' . $row['lastname'],
                'email' => $row['email'],
                'password' => bcrypt($row['password']),
                'password2' => $row['password'],
                'user_type' => 'S',
            ]);

            Student::create([
                'first_name' => $row['firstname'],
                'last_name' => $row['lastname'],
                'gender' => $row['gender'],
                'phone' => $row['phone'],
                'email' => $row['email'],
                'user_id' => $user->id,
            ]);
        }
    }
}
