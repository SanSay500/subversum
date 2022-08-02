<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RegionResource extends JsonResource
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
            'id'=>$this->id,
            'name'=>$this->name,
              'buildings' => BuildingMapResource::collection($this->buildings_map),
              'workes' => WorkerMapResource::collection($this->workers_map),
              'resources' => ResourceMapResource::collection($this->resources_map),
        ];
    }
}