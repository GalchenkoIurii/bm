<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStoreRequest extends FormRequest
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
            'category_id' => 'required|integer',
            'service_id' => 'required|integer',
            'start_price' => 'nullable|numeric',
            'end_price' => 'nullable|numeric',
            'photo' => 'nullable|image',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'place' => 'nullable|string|max:191',
            'country' => 'nullable|string|max:191',
            'region' => 'nullable|string|max:191',
            'district' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'street' => 'nullable|string|max:191',
            'house' => 'nullable|string|max:191',
            'locale_num' => 'nullable|string|max:191',
            'coord_lat' => 'nullable|string|max:191',
            'coord_long' => 'nullable|string|max:191',
            'name' => 'nullable|string|max:191',
            'phone' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
        ];
    }
}
