<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
            'plaque'=>'required|alpha_num|unique:vehicles,plaque|min:3|max:10',
            'capacity'=>'required|numeric|min:2|max:99999',
            'color'=>'required|alpha|min:3|max:30',
            'brand'=>'required|string|min:3|max:20',
            'model'=>'required|string|min:3|max:30',
            'status'=>'required',
        ];
    }
}
