<?php

namespace App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class SmallAdsPromotionRequest extends FormRequest
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

            'recomended' => 'required|in:none,Promocja!,Bestseller,Wyprzedaż',
           
            'highlighted' => 'required|in:#ffffff,#c8cdff,#ffc8dd,#c8ffdf,#eac8ff,#fff7c8',
           


            
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
            'recomended.required' => 'pole <b>nazwa</b> jest wymagane!<br>',            
            'highlighted.required' => 'pole <b>nazwa</b> jest wymagane!<br>',

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