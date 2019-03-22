<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\File;

class FileUserRequest extends FormRequest
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
        $files = File::select('id','type')->get();
        $rules = [];
        for($i=0;$i<count($files);$i++){
            
            if($files[$i]->type === 'pdf'){
                $rules['pdf('.$files[$i]->id.')'] = 'file|mimes:pdf,odt,docx,jpeg,jpg,png';
            }
            elseif($files[$i]->type === 'image'){
                $rules['image('.$files[$i]->id.')'] = 'image';
            }
        }
        return $rules;
    }
}
