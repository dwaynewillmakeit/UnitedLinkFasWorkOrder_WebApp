<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientAddress extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        return
        [
            'id'                => $this->id,
            'address_type_id'   => $this->address_type_id,
            'client_id'         => $this->client_id,
            'street'            => $this->street,
            'city'              => $this->city,
            'state'             => $this->state,
            'zipcode'           => $this->zipcode,
            'active'            => $this->active? true : false,
            'created_by'        => $this->created_by,
            'updated_by'        => $this->updated_by,
            'created_at'        => $this->created_at,
            'updated_at'        => $this->updated_at,
        ];
    }
}
