<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DriverUpdateRequest extends FormRequest
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
            'name'=>'required|min:5|max:30|string',
            'last_name'=>'required|min:5|max:30|string',
            'phone' => 'required|integer|min:7|digits:8',
            'address'=> 'required|string|min:5|max:50',
            'ci'        => 'required|integer|min:4|max:99999999',
            'license'   => 'required|alpha_num|min:4|max:15',
        ];
    }
}
