<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class RiderResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'user_id' => $this->id,
            'rider_id' => $this->rider->id,
            'name' => $this->name,
            'shift'  => $this->rider->shift->name, 
            'assign_zone'  => $this->rider->assignZone->title, 
        ];
    }
}
