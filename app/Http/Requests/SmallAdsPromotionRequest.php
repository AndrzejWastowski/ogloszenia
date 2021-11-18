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

            'inscription' => 'required|in:none,Promocja!,Wyprzedaż,Przecena,Bestseller',
            'highlighted' => 'required|in:#ffffff,#c8cdff,#ffc8dd,#c8ffdf,#eac8ff,#fff7c8',
            'promoted' => 'nullable',
            'master_portal' => 'nullable',
            'newspaper_background' => 'nullable',
            'newspaper_frame' => 'nullable',
            'newspaper_photo' => 'nullable',          
            'newspaper_edition[]' => 'array',
            'newspaper_edition' => 'array',
            'date_end_promoted' => 'integer',
            
            
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
            'inscription.required' => 'pole <b>inscription</b> jest wymagane!<br>',            
            'highlighted.required' => 'pole <b>podświelenie</b> jest wymagane!<br>',
            'date_end_promoted.required' => 'Pole z czasem obowiązywania promocji jest wymagane'

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