<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PermResource extends JsonResource
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
            'Role' => $this->whenLoaded('roles', function (){
                return new RoleResource($this->roles);
            }),
            'Module' => $this->name,
            'Create' => $this->create,
            'View' => $this->view,
            'Edit' => $this->edit,
            'Update' => $this->update,
            'Delete' => $this->delete


        ];
    }
}
