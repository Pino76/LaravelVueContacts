<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        return [
            "name" => "required|min:3",
            "email" => "required|email",
            "designation" => "required|string",
            "contact_no" => "required|min:3",
        ];
    }

    public function messages()
    {
        return[
            "name.required" => "Il campo nome è obbligatorio",
            "name.min" => "Il campo nome è obbligatorio",
            "email.required" => "Il campo email è obbligatorio",
            "email.email" => "Il campo email non ha un formato valido",
            "designation.required" => "Il campo designation è obbligatorio",
            "contact_no.required" => "Il campo contact_no è obbligatorio",
        ];
    }

}
