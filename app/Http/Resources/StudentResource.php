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
//        return parent::toArray($request);
        return [
            "std_name"=> $this->name,
            "id"=>$this->id,
            "email"=>$this->email,
            "image"=>asset('images/students/'.$this->image),
//            "track_id"=>$this->track_id,
//            "track_name"=>$this->track ? $this->track->name : null,
//            "track_info"=>[
//                "id"=>$this->track_id,
//                "name"=>$this->track ? $this->track->name : null,]
            "track"=>new TrackResource($this->track),
            "creator"=>new CreatorResource($this->creator)
        ];
    }
}
