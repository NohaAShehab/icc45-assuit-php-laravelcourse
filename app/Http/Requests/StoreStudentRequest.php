<?php

namespace App\Http\Requests;
use App\Rules\StudentValidName;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return false;
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", new StudentValidName()],
            "email" => "required|unique:students",
            "grade" => "required",
            "image" => "required|image|mimes:jpeg,png,jpg|max:2048"
        ];
    }

    public function messages(): array{
        return[
            "name.required" => "There is no student without name",
            "email.required" => "There is no student without email",
            "email.unique" => "There is already a student with this email",
            "grade.required" => "There is no student without grade",
            "image.required" => "There is no student without image",
        ];
    }
}
