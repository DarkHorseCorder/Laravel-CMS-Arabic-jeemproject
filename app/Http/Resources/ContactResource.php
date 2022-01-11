<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            "name"          => $this->name,
            "email"         => $this->email,
            "subject"       => $this->subject,
            "phone"         => $this->phone,
            "created_at"    => showDateTime($this->created_at),
        ];
    }
}
