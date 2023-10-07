<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules\Unique;

class UpdateUserRequest extends FormRequest
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
        $userId = $this->route('user'); // Mengambil ID dari user yang sedang di-update

        return [
            'name' => 'nullable|regex:/^[a-zA-Z0-9\s]+$/',
            'email' => [
                'nullable',
                (new Unique('users', 'email'))->ignore($userId),
            ],
            'password' => 'nullable',
            'is_admin' => 'nullable',
            'notelp' => 'nullable|digits_between:10,13',
            'alamat' => 'nullable|regex:/^[a-zA-Z0-9\s]+$/',
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
