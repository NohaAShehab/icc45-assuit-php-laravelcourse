<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
//        return true;
        return $this->user()->can('update', $this->student);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            "name" => "required",
            "grade" => "required",
            "email"=>["required", Rule::unique("students")->ignore($this->student)],
            "image" => "nullable|image|mimes:jpeg,png,jpg|max:2048"
        ];
    }

    public function messages(): array {
        return [
            "name.required" => "There is no student without name",
            "email.required" => "There is no student without email",
            "email.unique" => "There is already a student with this email",
            "grade.required" => "There is no student without grade",

        ];
    }
}
