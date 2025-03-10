<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $user = $this->user(); // Lấy thông tin người dùng hiện tại
        $rules = [
            'tentaikhoan' => ['required', 'string', 'max:50'],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
                Rule::unique(User::class)->ignore($user->id),
            ],
            'ngaysinh' => ['nullable', 'string', 'max:50'], // Có thể để trống, định dạng chuỗi
            'gioitinh' => ['nullable', 'string', 'in:Nam,Nữ,Khác'], // Chỉ chấp nhận các giá trị cụ thể
            'quequan' => ['nullable', 'string', 'max:255'],
        ];

        // Thêm quy tắc tùy theo vai trò
        if ($user->role === 'admin') {
            $rules = array_merge($rules, [
                'maquantri' => ['required', 'string', 'max:50'], // readonly trong form nhưng vẫn cần validate nếu gửi dữ liệu
                'tenquantri' => ['required', 'string', 'max:100'],
            ]);
        } elseif ($user->role === 'sinhvien') {
            $rules = array_merge($rules, [
                'masinhvien' => ['required', 'string', 'max:50'],
                'tensinhvien' => ['required', 'string', 'max:100'],
                'khoa' => ['nullable', 'string', 'max:100'],
                'lop' => ['nullable', 'string', 'max:100'],
            ]);
        } elseif ($user->role === 'giaovien') {
            $rules = array_merge($rules, [
                'magiaovien' => ['required', 'string', 'max:50'],
                'tengiaovien' => ['required', 'string', 'max:50'],
                'khoa' => ['nullable', 'string', 'max:100'],
            ]);
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'tentaikhoan.required' => 'Tên tài khoản là bắt buộc.',
            'tentaikhoan.max' => 'Tên tài khoản không được vượt quá 50 ký tự.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email không đúng định dạng.',
            'email.unique' => 'Email này đã được sử dụng.',
            'ngaysinh.max' => 'Ngày sinh không được vượt quá 50 ký tự.',
            'gioitinh.in' => 'Giới tính chỉ có thể là Nam, Nữ hoặc Khác.',
            'quequan.max' => 'Quê quán không được vượt quá 255 ký tự.',
            'maquantri.required' => 'Mã quản trị là bắt buộc.',
            'tenquantri.required' => 'Tên quản trị là bắt buộc.',
            'masinhvien.required' => 'Mã sinh viên là bắt buộc.',
            'tensinhvien.required' => 'Tên sinh viên là bắt buộc.',
            'magiaovien.required' => 'Mã giảng viên là bắt buộc.',
            'tengiaovien.required' => 'Tên giảng viên là bắt buộc.',
        ];
    }
}
