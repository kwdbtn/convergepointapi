<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerReading extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request) {
        return [
            'id'       => $this->id,
            'customer' => $this->customer->name,
            'erp_customer_id' => $this->customer->erp_id,
            'period'   => $this->reading_period->name,
            'status'   => $this->status,
        ];
    }
}
