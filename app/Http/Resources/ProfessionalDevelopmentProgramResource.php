<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfessionalDevelopmentProgramResource extends JsonResource
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
            'name' => $this->name,
            'date_approval_council' => $this->date_approval_council,
            'date_approval_faculty' => $this->date_approval_faculty,
            'date_approval_rector' => $this->date_approval_rector,
            'education_program' => $this->education_program
        ];
    }
}
