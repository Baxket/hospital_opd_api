<?php

namespace App\Http\Requests;

use App\Models\StaffType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StaffRequest extends FormRequest
{


    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {

        // $user = $this->user();
        // return $user && $user->tokenCan('create');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $staffTypes = StaffType::pluck('id')->toArray();
        return [
            //
            'staffNum' => ['required'],
            'fullName' => ['required'],
            'staffType' => ['required', Rule::in($staffTypes)],
            'phoneNumber' => ['required', 'digits:10'],
            'dob' => ['required'],
            'residence' => ['required'],
            'email' => ['required', 'email'],

        ];
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'staff_num' => $this->staffNum,
            'full_name' => $this->fullName,
            'staff_type_id' => $this->staffType,
            'phone_number' => $this->phoneNumber,
        ]);
    }
}
