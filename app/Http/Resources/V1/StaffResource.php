<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use App\Http\Resources\V1\StaffTypeResource;
use App\Http\Resources\V1\StaffTypeCollection;
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
        // $this->staff_type->name

        // dd($this->staff_type);
        return array(
            'id' => $this->id,
            'staffNum' => $this->staff_num,
            'fullName' => $this->full_name,
            'phoneNumber' => $this->id,
            'dob' => $this->dob,
            'residence' => $this->residence,
            'email' => $this->email,
            'staffType' => new StaffTypeResource($this->staff_type),

        );
    }
}
