<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class NewYogaPointRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if(Auth::user()) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
     public function rules()
     {
         return [
             'foo' => ['required'],
             'checkIn_lat' => ['required'],
             'checkIn_lng' => ['required'],
         ];
     }

     public function messages()
     {
         return [
             'foo.required' => "как же мы без описания",
             'checkIn_lat.required' => "Из введенного адреса не сгенерировалась широта, возможно Вы ввели адрес который отстутсвует в нашей навигационной базе, пожалуйста выбирайте адрес из выпадающего списка.",
             'checkIn_lng.required' => "Из введенного адреса не сгенерировалась долгота, возможно Вы ввели адрес который отстутсвует в нашей навигационной базе, пожалуйста выбирайте адрес из выпадающего списка.",
         ];
     }
}
