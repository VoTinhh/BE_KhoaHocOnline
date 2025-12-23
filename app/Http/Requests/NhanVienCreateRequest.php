<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NhanVienCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ho_va_ten'     => "required|min:4",
            'email'         => "required|email|unique:nhan_viens,email",
            'so_dien_thoai' => "required|digits:10",
            'password'      => "required|min:6|max:30",
            'dia_chi'       => "required",
            'tinh_trang'    => "required|boolean",
            'id_quyen'      => "required",
        ];
    }

    public function messages()
    {
        return [
            'ho_va_ten.*'       => "Họ và tên là bắt buộc và phải từ 4 ký tự.",
            'email.required'    => "Email là bắt buộc.",
            'email.email'       => "Email không đúng định dạng.",
            'email.unique'      => "Email đã tồn tại.",
            'so_dien_thoai.*'   => "Số điện thoại là bắt buộc và phải là 10 chữ số.",
            'password.*'        => "Mật khẩu là bắt buộc và phải từ 6 đến 30 ký tự.",
            'dia_chi.required'  => "Địa chỉ là bắt buộc",
            'tinh_trang.*'      => "Tình trạng là bắt buộc.",
            'id_quyen.*'        => "Quyền là bắt buộc",
        ];
    }
}
