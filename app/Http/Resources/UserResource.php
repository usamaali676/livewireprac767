<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'FatherName' => $this->fatherName,
            'CNIC' => $this->cnic,
            'Phone' => $this->phone,
            'role' => $this->whenLoaded('roles'),
            'Department' => $this->whenLoaded('department'),
            'Designation' => $this->whenLoaded('designation'),
            'Vehicle' => $this->whenLoaded('vehicle'),
        ];
    }
}
