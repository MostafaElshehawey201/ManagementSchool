<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherValidationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => "required|string",
            "image" => "required|mimes:png,jpg,jpeg,jifi,ifij|image",
            "phone" => "required|string",
            "salary" =>"required",
            "email" => "required|unique",
            "address" => "required",
            "teacher_id"=>"required",
            "created_by" => "required"
        ];
    }
}
