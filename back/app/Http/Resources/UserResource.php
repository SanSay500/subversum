<?php

namespace App\Http\Resources;

use App\Models\Region;
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
          'user_id'=> $this->id,
          'name'=>$this->name,
             'regions' => RegionResource::collection($this->regions),
        ];
    }
}
