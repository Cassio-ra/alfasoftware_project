<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $this->merge([
            'email' => strtolower($this->email)
        ]);

        $rules = [
            'name' => 'required|min:5',
            'contact' => ['required','numeric','digits:9'],
            'email' => ['required','email','max:100'],
        ];

        if ($this->id){
            $rules['contact'][] = Rule::unique('contacts')->ignore($this->id, 'id');
            $rules['email'][] = Rule::unique('contacts')->ignore($this->id, 'id');
        }else{
            $rules['contact'][] = Rule::unique('contacts');
            $rules['email'][] = Rule::unique('contacts');
        }

        return $rules;
    }
}
