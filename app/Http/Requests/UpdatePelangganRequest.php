<?php

namespace App\Http\Requests;

use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdatePelangganRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->route('pelanggan'); // Mendapatkan ID dari rute

        return [
            'nama_pelanggan' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'notelp' => 'required|digits_between:10,13',
            'different:pelanggan,notelp,' . $id . ',id',
            Rule::unique('pelanggan')->ignore($id, 'id'),
            'alamat' => 'required|regex:/^[a-zA-Z0-9\s,]+$/',
        ];
    }

    public function messages()
    {
        return [
            'notelp.required' => 'Nomor telepon harus diisi.',
            'notelp.numeric' => 'Nomor telepon harus berupa angka.',
            'notelp.digits_between' => 'Nomor telepon harus memiliki panjang antara :min sampai :max digit.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal menyimpan data.')
        );
    }
}
