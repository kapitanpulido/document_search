<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProcessRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return [
        'department_id' 		=> 'gt:0',
        'name'          		=> 'required',
				'transaction_code' 	=> 'required'
      ];
    }

    public function messages()
    {
      return [
        'department_id.*' 		=> 'Department is required.',
        'name.*'          		=> 'Process name is required.',
				'transaction_code.*' 	=> 'Transacation code is required.'
      ];
    }
}
