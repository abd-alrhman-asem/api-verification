<?php

namespace App\Http\Requests\Auth\signupAndVerificationRequests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class SignupRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'profile_photo' => 'nullable|file|image|max:10048', // Validate profile photo size and type
            'phone_number' => ' string|required',
            'certificate' => 'nullable|file|mimetypes:application/pdf|max:110240', // Validate certificate type and size
            'password' => 'required|string|min:8', // Password rules and confirmation
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $errorMessages = $validator->errors()->all();
        throw new HttpResponseException(
            response: unprocessableResponse(
                $errorMessages
            )
        );
    }

}
