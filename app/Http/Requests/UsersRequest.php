<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UsersRequest extends FormRequest
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
        if($this->password != null){
            $validation = [
                'name'=>'required',
                'lastname'=>'required',
                'password'=>'confirmed|min:6'
            ];
        }
        else{
            $validation = [
                'name'=>'required',
                'lastname'=>'required',
            ];
        }
        return $validation;
    }
}
