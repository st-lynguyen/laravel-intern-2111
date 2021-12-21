<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255',
            'description' => 'required|max:255',
            'type' => 'required|numeric',
            'status' => 'required|numeric',
            'start_date' => 'required|date|after_or_equal:today',
            'due_date' => 'required|date|after_or_equal:start_date',
            'assignee' => 'required|numeric',
            'estimate' => 'required|numeric',
            'actual' => 'numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'required' => 'Không được để trống',
            'max' => ':attribute Tối đa :max kí tự',
            'start_date.after_or_equal' => 'Ngày bắt đầu phải là một ngày sau hoặc bằng ngày hôm nay',
            'due_date.after_or_equal' => 'Ngày đến hạn phải sau hoặc bằng ngày bắt đầu',
            'numeric' => 'Vui lòng nhập số',
        ];
    }
    
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'description' => 'Mô tả',
        ];
    }
}
