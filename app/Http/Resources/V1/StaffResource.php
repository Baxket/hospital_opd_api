<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StaffResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return array(
            'id' => $this->id,
            'staffNum' => $this->staff_num,
            'fullName' => $this->full_name,
            'staffType' => $this->staff_type->name,
            'phoneNumber' => $this->id,
            'dob' => $this->dob,
            'residence' => $this->residence,
            'email' => $this->email,
        


        );
    }
}
