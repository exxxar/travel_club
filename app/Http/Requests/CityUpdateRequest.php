<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CityUpdateRequest extends FormRequest
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
            'CityId' => 'required|integer',
            'Name' => 'required|string|max:100',
            'Default' => 'required',
            'DescriptionUrl' => 'required|string|max:500',
            'IsPopular' => 'required',
            'ParentId' => '',
        ];
    }
}
