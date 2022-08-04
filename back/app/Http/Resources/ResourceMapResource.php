<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourceMapResource extends JsonResource
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
            'resource_id'=>$this->resource_id,
            'short_storage_value'=>$this->short_storage_value,
            'overall_storage_value'=>$this->overall_storage_value,
            'total'=>$this->total_count,
            'mining_level'=>$this->mining_level,
        ];
    }
}
