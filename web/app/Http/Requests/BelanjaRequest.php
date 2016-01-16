<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BelanjaRequest extends Request
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
            'output'            => 'required',
            'sub_output'        => 'required',
            'input'             => 'required',
            'sub_input'         => 'required',
            'MAK'               => 'required',
            'no_tanda_bukti'    => 'required',
            'tgl'               => 'required',
            'no_bku'            => 'required',
            'penerima'          => 'required',
            'uraian'            => 'required',
            'jumlah'            => 'required',

       ];
    }
}
