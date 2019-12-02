<?php

declare(strict_types=1);

namespace App\Request\Xcx;

use Hyperf\Validation\Request\FormRequest;

class RemarkRequest extends FormRequest
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
            'money' => '',
            'openid' => 'required',
            'type' => 'integer,required',
            'content' => '',
        ];
    }

    public function messages(): array
    {
        return [
            'openid.required' => '用户未登陆',
            'type.integer' => '类型格式错误',
            'type.required' => '类型必填',
        ];
    }
}
