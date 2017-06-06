<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetitionRequest extends FormRequest
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
            'title' =>'required|min:5|max:255',
            'body'  =>'required|between:20,255'
            //
        ];
    }

    public function messages()
    {
        return [
            'titile.rquired' => 'judul tidak boleh kosong',
            'title.between'  => 'judul harus antara : min sampai :max karakter',
            'body.required'  => 'deskripsi tidak boleh kosong',
            'body.between'   => 'deskripsi harus antara : min sampai : max karakter'
        ]; // TODO: Change the autogenerated stub
    }
}