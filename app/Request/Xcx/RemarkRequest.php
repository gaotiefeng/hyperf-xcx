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
            'type' => 'integer | required',
            'content' => '',
            'formId' => '',
        ];
    }

    public function messages(): array
    {
        return [
            'openid.required' => '用户未登陆',
            'type.integer' => '类型格式错误',
            'type.require' => '类型必填',
        ];
    }
}
