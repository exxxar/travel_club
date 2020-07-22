<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserTicketUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'UserId' => 'required',
            'TourId' => 'required',
            'TicketInfo' => 'required|json',
            'TotalPayment' => 'required|numeric',
            'CurrentPayment' => 'required|numeric',
            'ContactPhone' => 'required|string|max:100',
            'DepartureAt' => '',
            'DepartureFrom' => 'string|max:100',
            'deleted_at' => '',
        ];
    }
}
