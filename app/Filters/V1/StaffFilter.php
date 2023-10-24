<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;


class StaffFilter
{
    
    protected $allowed = [
        'staffNum' => ['eq'],
        'staffType' => ['eq'],
        'fullName' => ['eq'],
        'phoneNumber' => ['eq'],
        'dob' => ['eq'],
        'residence' => ['eq'],
        'email' => ['eq'],

    ];

    protected $columnMap = [
        'staffNum' => 'staff_num',
        'fullName' => 'full_name',
        'phoneNumber' => 'phone_number',
        'staffType' => 'staff_types.name',
        'dob' => 'dob',
        'residence' => 'residence',
        'email' => 'email',
    ];

  
    protected $operatorMap = [
        'eq' => '=',
    ];


    public function transform(Request $request)
    {
        $eloquentQuery = [];

        foreach ($this->allowed as $params => $operators) {
           $query = $request->query($params);

           if(!isset($query))
           {
            continue;
           }  


           $column =  $this->columnMap[$params] ?? $params; 

           foreach ($operators as $key => $operator) {
            # code...
            if(isset($query[$operator]))
            {
                $eloquentQuery[] = [$column, $this->operatorMap[$operator], $query[$operator]];
            }
           }


        }

        return $eloquentQuery;
    }
}