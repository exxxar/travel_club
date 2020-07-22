<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserInfo extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'FullName' => $this->FullName,
            'Age' => $this->Age,
            'Sex' => $this->Sex,
            'Birthday' => $this->Birthday,
            'Passport' => $this->Passport,
            'Account' => $this->user->select("phone", "name", "email")->first(),
            'Tickets' => new UserTicketCollection($this->tickets),
           'Tours' => new UserTourCollection($this->tours)

        ];
    }
}
