<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class GiangVienRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(Request $request)
    {
        $rules=[];
        $curanAction=$this->route()->getActionMethod();
        switch($this->method()){
            case'POST':
                switch ($curanAction) {
                    case 'add':
                        $rules=[
                            'ten_giangvien'=>'required',
                            'dia_chi'=>'required',
                            'email'=>'required|email|unique:giang_vien',
                            'sdt'=>'required',
                        ];
                        # code...
                        break;
                    case 'update':
                        $rules=[
                            'ten_giangvien'=>'required',
                            'dia_chi'=>'required',
                            'email'=>'required|email|unique:giang_vien,email,'.$request->id,
                            'sdt'=>'required'
                        ];
                        break;
                    
                    default:
                        # code...
                        break;
                }
                break;
            default:
                break;    
        }
        return $rules;
    }
    public function messages()
    {
        return [
            'ten_giangvien.required'=>'Bạn phải nhập tên giảng viên.',
            'dia_chi.required'=>'Bạn phải thêm địa chỉ',
            'email.required'=>'Bạn phải nhập email',
            'email.unique'=>'Email đã tồn tại',
            'sdt.required'=>'Bạn phải nhập sdt',
        ];
    }
}
