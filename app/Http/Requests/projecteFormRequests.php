<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class projecteFormRequests extends FormRequest
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
            'nome_progetto'=>'required|string|max:30|min:5',
            'inizio_progetto'=>'required',
            'descrizione'=>'required|string|max:300|min:5',
        ];
    }
}
