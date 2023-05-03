<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfilingResource extends JsonResource
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
            "id" => $this->id,
            "first_name" => $this->first_name,
            "last_name" => $this->last_name,
            "email" => $this->email,
            "primary_legal_counsel" => $this->primary_legal_counsel,
            "profile_image" => $this->profile_image,
            "case_details" => $this->case_details,
            "is_active" => $this->is_active,
            "dob" => $this->dob,
            "created_at" => $this->created_at,
        ];
    }
}
