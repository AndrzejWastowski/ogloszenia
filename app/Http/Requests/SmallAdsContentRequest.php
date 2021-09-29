<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class SmallAdsContentRequest extends FormRequest
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
            'id' => 'required|integer|min:0',
            'name' => 'required|min:5|max:255',
            'lead' => 'required|min:15|max:255',
            'description' => 'required|min:30|max:2500',
            'items' => 'required|integer|min:0|max:99999999',
            'price' => 'required|numeric|min:0|max:99999999',
            'date_start' => 'required|date|date_format:Y-m-d|after:yesterday',
            'date_end' => 'required|integer|min:1|digits_between: 1,30',
            'small_ads_categories_id' => 'required|integer|min:1',
            'small_ads_sub_categories_id' => 'required|integer|min:1',
            'small_ads_classified_enum' => 'required|in:sprzedam,kupię,zamienię,oddam,wypożyczę',            
            'contact_phone' =>  'nullable',
            'contact_email' =>  'nullable', 'email:rfc',function($attribute, $value, $fail) {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
               $fail($attribute . ' is invalid.');
            }
         } ,           
                'name.required' => 'pole <b>nazwa</b> jest wymagane!<br>',
                'name.min' => 'pole <b>nazwa</b> musi zawierać wiecej niż 5 znaków (i mniej niż 255!)<br>',
                'name.max' => 'pole <b>nazwa</b> musi zawierać mniej niż 255 znaków (i więcej niż 10!)<br>',
                'lead.required' => 'pole <b>lid</b> jest wymagane!<br>',
                'lead.min' => 'pole <b>lid</b> musi zawierać wiecej niż 15 znaków (i mniej niż 255!)<br>',
                'lead.max' => 'pole <b>lid</b> musi zawierać mniej niż 255 znaków (i więcej niż 30!)<br>',
                'description.required' => 'pole <b>opis</b> jest wymagane!<br>',
                'description.min' => 'pole <b>opis</b> musi zawierać wiecej niż 30 znaków (i mniej niż 2500!)<br>',
                'description.max' => 'pole <b>opis</b> musi zawierać mniej niż 2500 znaków (i więcej niż 30!)<br>',
                'date_start.required' => 'Pole <b>data start</b> jest niepoprawne<br>',
                'date_start.date_format' => 'niepoprawny format <b>data start</b>',
                'date_start.after' => 'Pole  <b>data startowa</b> ogłoszenia nie może być z datą wsteczną!',
                'date_end.required' => 'Pole <b>data end</b> musi być późniejsza niż data start',            
                'small_ads_categories_id:required' => 'nie wybrałeś podkategorii',
                'small_ads_categories_id:min:1' => 'nie wybrałeś podkategorii',
                'invoice:required' => 'pole z rodzajem rachunku jest wymagane',
                'price:required' => 'pole <b>cena</b> jest wymagane',
                'price:max' => 'Chyba troche przesadziłeś z <b>ceną</b> ',
                'invoice:in' => 'niepoprawna wartość w polu rodzaj rachunku'
            
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
            'name.required' => 'pole <b>nazwa</b> jest wymagane!<br>',
            'name.min' => 'pole <b>nazwa</b> musi zawierać wiecej niż 10 znaków (i mniej niż 255!)<br>',
            'name.max' => 'pole <b>nazwa</b> musi zawierać mniej niż 255 znaków (i więcej niż 10!)<br>',
            'lead.required' => 'pole <b>lid</b> jest wymagane!<br>',
            'lead.min' => 'pole <b>lid</b> musi zawierać wiecej niż 30 znaków (i mniej niż 255!)<br>',
            'lead.max' => 'pole <b>lid</b> musi zawierać mniej niż 255 znaków (i więcej niż 30!)<br>',
            'description.required' => 'pole <b>opis</b> jest wymagane!<br>',
            'description.min' => 'pole <b>opis</b> musi zawierać wiecej niż 30 znaków (i mniej niż 2500!)<br>',
            'description.max' => 'pole <b>opis</b> musi zawierać mniej niż 2500 znaków (i więcej niż 30!)<br>',
            'date_start.required' => 'Pole <b>data start</b> jest niepoprawne<br>',
            'date_start.date_format' => 'niepoprawny format <b>data start</b>',
            'date_start.after' => 'Pole  <b>data startowa</b> ogłoszenia nie może być z datą wsteczną!',
            'date_end.required' => 'Pole <b>data end</b> musi być późniejsza niż data start',            
            'small_ads_categories_id:required' => 'nie wybrałeś podkategorii',
            'small_ads_categories_id:min:1' => 'nie wybrałeś podkategorii',
            'invoice:required' => 'pole z rodzajem rachunku jest wymagane',
            'price:required' => 'pole <b>cena</b> jest wymagane',
            'price:max' => 'Chyba troche przesadziłeś z <b>ceną</b> ',
            'invoice:in' => 'niepoprawna wartość w polu rodzaj rachunku',
            'small_ads_classified_enum:re' => 'required|in:sprzedam,kupię,zamienię,oddam,wypożyczę',
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