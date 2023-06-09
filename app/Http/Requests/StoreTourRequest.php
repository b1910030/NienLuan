<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTourRequest extends FormRequest
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
            'name' => 'required',
            'location' => 'required',
            'duration' => 'required',
            'date_start' => 'required',
            'location_start' => 'required',
            'quality' => 'required',
            'vehical' => 'required',
            'description' => 'required',
            'price' => 'required|integer',
            'category_id' => 'required'
        ];
    }
}
