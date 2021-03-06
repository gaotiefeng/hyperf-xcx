<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf-cloud/hyperf/blob/master/LICENSE
 */

namespace App\Request\Admin;

use Hyperf\Validation\Request\FormRequest;

class LoginRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'mobile' => 'required | regex:/^1\d{10}$/',
            'password' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'mobile.regex' => 'mobile is error',
            'mobile.required' => 'mobile is required',
            'password.required' => 'password is required',
        ];
    }
}
