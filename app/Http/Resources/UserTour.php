<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserTour extends JsonResource
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
            'id' => $this->id,
            /*'UserId' => $this->UserId,*/
            'TourInfo' => $this->TourInfo,
            'StartAt' => $this->StartAt,
            'EndAt' => $this->EndAt,
            'Comment' => $this->Comment,
        ];
    }
}
