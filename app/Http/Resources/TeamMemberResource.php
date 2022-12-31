<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamMemberResource extends JsonResource
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
            'id' => $this->id,
            'employees_id' => $this->employees_id,
            'roles_id' => $this->roles_id,
            'teams_id' => $this->teams_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'team' => new TeamResource($this->team),
            'role' => new RoleResource($this->role),
            'employee' => new EmployeeResource($this->employee) 
        ];
    }
}
