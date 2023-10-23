<?php

namespace App\Services\V1;

use Illuminate\Http\Request;


class StaffQuery
{
    
    protected $allowed = [
        'staff_num' => ['eq'],
        'full_name' => ['eq'],
        'phone_number' => ['eq'],
        'dob' => ['eq'],
        'residence' => ['eq'],
        'email' => ['eq'],

    ];


    protected $operationMap = [
        'eq' => '=',
    ];


    public function transformed(Request $request)
    {
        $eloquentQuery = [];

        foreach ($this->allowed as $params => $operators) {
           $query = $request->query($params);

           if(!isset($query)) 
        }
    }
}