<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BuyStoreRequest extends FormRequest
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
            'user_id'   => 'required',
            'provider_id' =>'required',
            'product_id'=> 'required',
            'cuantity'  => 'required|numeric|min:1|max:999999',
            'unitary'   => 'required|numeric|min:0|max:99999',
            'status'    => 'required',
        ];
    }
}
