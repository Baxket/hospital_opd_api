<?php

namespace App\Http\Requests;

use App\Models\StaffType;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StaffUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        
        $user = $this->user();
        return $user && $user->tokenCan('update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $staffTypes = StaffType::pluck('id')->toArray();


        if($this->method() == 'PUT')
        {
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
        else
        {
            return [
                //
                'staffNum' => ['sometimes', 'required'],
                'fullName' => ['sometimes', 'required'],
                'staffType' => ['sometimes', 'required', Rule::in($staffTypes)],
                'phoneNumber' => ['sometimes', 'required', 'digits:10'],
                'dob' => ['sometimes', 'required'],
                'residence' => ['sometimes', 'required'],
                'email' => ['sometimes', 'required', 'email'],

            ];
        }
    }

    protected function prepareForValidation()
    {
        $this->merge( array_merge(
            $this->staffNum ? [
            'staff_num' => $this->staffNum,
            ] : [],
            $this->fullName ? [
            'full_name' => $this->fullName,
            ] : [],
            $this->staffType ? [
            'staff_type_id' => $this->staffType,
            ] : [],
            $this->phoneNumber ? [
            'phone_number' => $this->phoneNumber,
            ] : [],
        ));
    }
}
