<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TracNghiemDeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'        =>'required|exists:trac_nghiems,id'
        ];
    }
    
    public function messages()
    {
        return [
            'id.required'        =>'Không tìm thấy câu hỏi',
            'id.exists'          =>'Câu hỏi không tồn tại!'
        ];
    }
}
