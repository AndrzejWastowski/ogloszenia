<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CreateSmallAdsPhotoRequest extends FormRequest
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
        return ['photos' => 'required',
            'photos.*' => 'mimes:jpeg,png,jpg,gif|max:2048'
            
        ];
    }

     /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'photos.required' => 'wysłanie zdjęcia jest jest wymagane!<br>',
           
        ];
    }

    /**
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'email' => 'trim|lowercase',
            'name' => 'trim|capitalize|escape'
        ];
    }
}