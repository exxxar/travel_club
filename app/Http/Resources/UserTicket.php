<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTicket extends JsonResource
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
           /* 'id' => $this->id,
            'UserId' => $this->UserId,*/
            'TourId' => $this->TourId,
            'TicketInfo' => $this->TicketInfo,
            'TotalPayment' => $this->TotalPayment,
            'CurrentPayment' => $this->CurrentPayment,
            'ContactPhone' => $this->ContactPhone,
            'DepartureAt' => $this->DepartureAt,
            'DepartureFrom' => $this->DepartureFrom,
            'deleted_at' => $this->deleted_at,

        ];
    }
}
