<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SPJRequest extends Request
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
            'id_bagian'         => 'required',
            'output'            => 'required',
            'id_suboutput'      => 'required',
            'id_input'          => 'required',
            'id_subinput'       => 'required',
            'id_akun'           => 'required',
            'untuk_pembayaran'  => 'required',
        ];
    }
}
