<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ServicesContentRequest extends FormRequest
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
            'id' => ['required', 'integer', 'min:0'],
            'name' => 'required|min:10|max:255',
            'lead' => 'required|min:30|max:255',
            'description' => 'required|min:30|max:2500',                     
            'services_categories_id' => 'required|integer|min:1',      
            'date_start' => 'required|date|date_format:Y-m-d|after:yesterday',
            'date_end' => 'required|integer|min:1|digits_between: 1,30',            
            'contact_phone' =>  'nullable',
            'contact_email' =>  'nullable', 'email:rfc',function($attribute, $value, $fail) {
            if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
               $fail($attribute . ' is invalid.');
            }
         } 
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
            'description.min' => 'pole <b>opis</b> musi zawierać wiecej niż 30 znaków (i mniej niż 250!)<br>',
            'description.max' => 'pole <b>opis</b> musi zawierać mniej niż 3000 znaków (i więcej niż 30!)<br>',
            'date_start.required' => 'Pole <b>data start</b> jest niepoprawne<br>',
            'date_start.date_format' => 'niepoprawny format <b>data start</b>',
            'date_start.after' => 'Pole  <b>data startowa</b> ogłoszenia nie może być z datą wsteczną!',
            'date_end.required' => 'Pole <b>data end</b> musi być późniejsza niż data start',            
            'services_categories_id:required' => 'nie wybrałeś podkategorii',
            'services_categories_id:min:1' => 'nie wybrałeś podkategorii',                  
       
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