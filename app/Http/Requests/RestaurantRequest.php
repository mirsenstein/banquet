<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class RestaurantRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if ($this->isMethod('POST')) {
            return [
                'name' => 'required|max:100|unique:restaurants',
                'address' => 'required'
            ];
        }elseif($this->isMethod('PUT')){
            $restaurant_id = request()->route('restaurant');
            return [
                'name' => 'required|max:100|unique:restaurants,name,'.$restaurant_id.',id',
                'address' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Името на ресторанта е задължително!',
            'name.unique' => 'Вече съществува ресторант с това име!',
            'name.max' => 'Името на ресторанта не може да бъде повече от 100 символа',
            'address.required'  => 'Адресът на ресторанта е задължителен!',
        ];
    }
}
