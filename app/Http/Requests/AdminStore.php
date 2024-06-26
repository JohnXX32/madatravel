<?php

namespace App\Http\Requests;
use App\Models\Admins;

use Illuminate\Foundation\Http\FormRequest;

class AdminStore extends FormRequest
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
        //$emailRule = 'unique:admins';

/*        if($this->method() == 'PATCH')
        {
            $emailRule = 'unique:admins,email,'.$this->admin;
        }
*/        
        return [
            'email' => 'required|email|',
            'password' => 'required|string|min:6',
        ];
    }
}
