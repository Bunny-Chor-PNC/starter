<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            
            "id"=> $this->id,
            "full_name"=> $this->full_name,
            "age"=> $this->age,
            "province"=> $this->province,
            "class"=> $this->class,
            "grade"=> $this->grade,
        ];
    }
}
