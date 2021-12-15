<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileEditRequest extends FormRequest
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
            'photo' => 'nullable|image',
            'first_name' => 'required|string|max:191',
            'last_name' => 'nullable|string|max:191',
            'email' => 'nullable|email|max:191',
            'phone' => 'nullable|string|max:191',

            'category_id' => 'nullable|integer',
            'service_ids' => 'nullable|array',

            'country' => 'nullable|string|max:191',
            'region' => 'nullable|string|max:191',
            'district' => 'nullable|string|max:191',
            'city' => 'nullable|string|max:191',
            'street' => 'nullable|string|max:191',
            'house' => 'nullable|string|max:191',
            'locale_num' => 'nullable|string|max:191',
            'place' => 'nullable|string|max:191',

            'about' => 'nullable|string|max:1000',
            'education' => 'nullable|string|max:2000',
            'experience' => 'nullable|string|max:2000',

            'coord_lat' => 'nullable|string|max:191',
            'coord_long' => 'nullable|string|max:191',
        ];
    }
}
