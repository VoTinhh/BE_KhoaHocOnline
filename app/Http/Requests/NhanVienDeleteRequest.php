<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienDeleteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'        =>'required|exists:nhan_viens,id'
        ];
    }
    public function messages()
    {
        return  [
            'id.required'        =>'Không tìm thấy nhân viên',
            'id.exists'          =>'Nhân viên không tồn tại!'
        ];
    }
}
