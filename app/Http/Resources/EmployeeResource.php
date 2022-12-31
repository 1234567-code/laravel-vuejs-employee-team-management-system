<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'employee_code' => $this->employee_code,
            'employee_name' => $this->employee_name,
            'user_accounts_id' => $this->user_accounts_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_account' => new UserAccountResource($this->user_account)
        ];
    }
}
