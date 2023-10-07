<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRepairRequest extends FormRequest
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
        return [
        'pelanggan_id' => 'required',
        'user_id' => 'required',
        'nomor_servis' => 'nullable|unique:repairs',
        'jenis_gadget' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        'tipe_gadget' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        'tanggal_masuk' => 'required',
        'kelengkapan' => 'required|regex:/^[a-zA-Z0-9,\s]+$/',
        'kerusakan' => 'required|regex:/^[a-zA-Z0-9,\s]+$/',
        'password_device' => 'required|regex:/^[a-zA-Z0-9\s-]+$/',
        'status' => 'nullable|regex:/^[a-zA-Z0-9\s]+$/',
        'comments' => 'nullable|regex:/^[a-zA-Z0-9\s]+$/|max:100',
        ];
    }
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            redirect()->back()->withInput()->withErrors($validator->errors())->with('error', 'Gagal menambah data servis.')
        );
    }
}
