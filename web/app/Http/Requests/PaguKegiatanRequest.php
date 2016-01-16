<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaguKegiatanRequest extends Request
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
            'id_subinput' => 'required',
            'id_akun' => 'required',
            'id_pagu' => 'required',
            'batasan' => 'required',
        ];
        
    }
    public function attributes(){
        return [
            'id_pagu' => 'Pagu',
            'id_akun' => 'Akun',
            'id_subinput' => 'Sub Input',
            ];
    }
}
