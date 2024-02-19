<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        $this->load('genres');
        return [
            'id'=>$this->id, 
            'title'=>$this->title,
            'description'=>$this->description,
            'author'=>$this->author,
            'duration'=>$this->duration, 
            'poster_url'=>$this->poster_url,
            'genres'=>$this->genres,
        ];
    }
}
