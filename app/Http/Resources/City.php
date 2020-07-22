<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class City extends JsonResource
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
            'CityId' => $this->CityId,
            'Name' => $this->Name,
            'Default' => $this->Default,
            'DescriptionUrl' => $this->DescriptionUrl,
            'IsPopular' => $this->IsPopular,
            'ParentId' => $this->ParentId,
        ];
    }
}
