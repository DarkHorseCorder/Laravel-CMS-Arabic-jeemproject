<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
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
            'ref_no'        => $this->ref_no,
            "gateway"       => $this->gateway,
            "currency"      => $this->currency,
            "stripe_id"     => $this->stripe_id,
            "status"        => $this->status,
            "user"          => $this->user,
            "order"         => $this->order,
            "amount"        => $this->amount,
            "created_at"    => $this->created_at,
            "updated_at"    => $this->updated_at,
            "amount_pretty"        => addCurrency($this->amount),
            "created_at_pretty"    => showDate($this->created_at),
        ];

    }
}
