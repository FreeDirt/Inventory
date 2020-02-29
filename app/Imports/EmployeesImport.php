<?php

namespace App\Imports;

use App\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Employee([
            //return
            'Name'=> $row['name'],
            'Email'=> $row['email'],
            'Employee_no'=> $row['employee_no'],
            'Gender'=> $row['gender'],
            'Cover_image'=> $row['cover_image'],
            'User_id'=> $row['user_id'],
            'Created At'=> $row['created_at'],
            'Updated At'=> $row['updated_at'],
        ]);
    }
}
