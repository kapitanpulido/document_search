<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
      $rules = [
        'role_id'   => 'required|integer|min:1|max:255',
        'name'      => 'required|string|max:255',
        'is_active' => 'required|integer',
      ];

      if(routeName() == 'maintenance.user.store'){
        $rules['email']     = 'required|email|max:50|unique:users';
        $rules['password']  = 'required|confirmed|min:8';
      }
      else{
        $id = decrypt($this->route()->user);
        $rules['email']     = 'required|email|max:50|unique:users,email,'.$id;
        $rules['password']  = 'confirmed';
      }

      return $rules;
    }


    public function messages()
    {
      $messages = [
        'role_id.required'  => 'Role is required.',
        'role_id.integer'   => 'Invalid Role value.',
        'role_id.min'       => 'Please select user role.',
        'role_id.max'       => 'Invalid Role value.',
        'email.required'    => 'Email is required.',        'email.email'       => 'Invalid Email value.',
        'email.max'         => 'Email must have less than or equal to 50 characters.',
        'email.unique'      => 'Email has been used.',
        'name.required'     => 'Name is required.',
        'name.max'          => 'Name must have less than or equal to 50 characters.',
        'is_active.*'       => 'Invalid active field value.',
      ];

      if(routeName() == 'maintenance.user.store'){
        $messages['password.required']  = 'Password is required.';
        $messages['password.confirmed'] = 'Passwords does not match.';
        $messages['password.min']       = 'Password must be at least eight characters.';
      }

      return $messages;
    }
}
