<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PaguBagianRequest extends Request
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
            'id_bagian' => 'required',
            'id_pagu' => 'required',
            'jumlah' => 'required',
        ];
    }
    public function attributes(){
        return [
            'id_bagian' => 'Prodi/Bagian',
            'id_pagu' => 'Tahun',
            'jumlah' => 'Alokasi',
            ];
    }
}
