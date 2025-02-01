<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'current_password' => [
                // Only require the current password if a new password is provided.
                Rule::requiredIf(function () {
                    return $this->filled('password');
                }),
                // Verify that the provided current password is correct.
                function ($attribute, $value, $fail) {
                    if ($this->filled('password') && !Hash::check($value, $this->user()->password)) {
                        $fail('The current password is incorrect.');
                    }
                },
            ],
            'name' => ['sometimes', 'string', 'max:255'],
            'email' => [
                'sometimes',
                'email',
                'max:255',
                Rule::unique('users')->ignore($this->user()->id)
            ],
            'phone' => ['sometimes', 'string', 'max:20'],
            'address' => ['sometimes', 'string'],
            'image' => ['sometimes', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ];
    }
}
