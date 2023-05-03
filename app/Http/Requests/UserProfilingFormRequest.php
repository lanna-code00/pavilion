<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserProfilingFormRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;
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
            //
           'first_name' => ['bail', 'required', 'string'],
           'last_name' => ['bail', 'required', 'string'],
           'email' => ['bail', 'required', Rule::unique('users')->ignore($this->user?->id)->where(function($query) {
                return $query->where('email', request()->email);
                    })
                ],
            'profile_image' => ['bail', 'nullable'],
            'dob' => ['bail', 'required'],
            'primary_legal_counsel' => ['bail', 'required', 'string'],
            'case_details' => ['bail', 'required', 'string', 'max:2000']
        ];
    }
}
