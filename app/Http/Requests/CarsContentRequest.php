<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class CarsContentRequest extends FormRequest
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
            'id' => 'required', 'integer', 'min:0',
            'lead' => 'required|min:30|max:255',
            'description' => 'required|min:30|max:2500',
            'country_registration' => 'required|min:5|max:55',  
            'cars_brands_id' => 'required|integer|min:1',      
            'cars_models_id' => 'required|integer|min:1',   
            'cars_body_id' => 'required|integer|min:1',   
            'date_production' => 'required',
            'date_registration' => 'required',
            'country_registration' => 'required',
            'poland_registration' =>'nullable',
            'power' =>'nullable',
            'fuel_type' =>'required|in:"Benzyna","Olej napędowy","Gaz LPG","Gaz CNG","Elektryczny","Hybryda,Wodór"',
            'capacity' =>'required|integer|min:0',
            'doors_number' =>'required|integer|min:0',
            'seats' =>'required|integer|min:0',
            'condition'=> 'required|in:nowy,używany',            
            'technical_condition' => 'required',            
            'price' => 'required|numeric|min:0|max:99999999',              
            'contact_phone' =>  'nullable',
            'contact_email' =>  'nullable', 'email:rfc',function($attribute, $value, $fail) {
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    $fail($attribute . ' is invalid.');
                }
            },
            'invoice' => 'required|in:Nie wystawiam faktury,Faktura VAT,Faktura Vat-marża,Faktura bez VAT',
            'date_start' => 'required|date|date_format:Y-m-d|after:yesterday',
            'date_end' => 'required|integer|min:1|digits_between: 1,30',            
           
            
         
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
   
            'lead.required' => 'pole <b>lid</b> jest wymagane!<br>',
            'lead.min' => 'pole <b>lid</b> musi zawierać wiecej niż 30 znaków (i mniej niż 255!)<br>',
            'lead.max' => 'pole <b>lid</b> musi zawierać mniej niż 255 znaków (i więcej niż 30!)<br>',
            'description.required' => 'pole <b>opis</b> jest wymagane!<br>',
            'description.min' => 'pole <b>opis</b> musi zawierać wiecej niż 30 znaków (i mniej niż 250!)<br>',
            'description.max' => 'pole <b>opis</b> musi zawierać mniej niż 3000 znaków (i więcej niż 30!)<br>',
            'country_registration.required' => 'pole <b>pierwsza rejestracja</b> jest wymagane<br>',
            'poland_registration.required' => 'pole <b>rejestracja w Polsce</b> jest wymagane<br>',            
            'date_start.required' => 'Pole <b>data start</b> jest niepoprawne<br>',
            'date_start.date_format' => 'niepoprawny format <b>data start</b>',
            'date_start.after' => 'Pole  <b>data startowa</b> ogłoszenia nie może być z datą wsteczną!',
            'date_end.required' => 'Pole <b>data end</b> musi być późniejsza niż data start',            
            'cars_brands_id:required' => 'nie wybrałeś podkategorii',
            'cars_brands_id:min:1' => 'nie wybrałeś podkategorii',
            'cars_models_id:required' => 'nie wybrałeś podkategorii',
            'cars_models_id:min:1' => 'nie wybrałeś podkategorii',
            'area' => 'niepoprawnie wybrana powierzchnia',
            'price:required' => 'pole <b>cena</b> jest wymagane',
            'price:max' => 'Chyba troche przesadziłeś z <b>ceną</b> ',          
         
       
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
            'lead' => 'trim|capitalize|escape'
        ];
    }
}