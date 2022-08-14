<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhoaHocRequest extends FormRequest
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
    public function rules()
    {
        $rules=[];
        $curanAction=$this->route()->getActionMethod();
        switch($this->method()){
            case'POST':
                switch($curanAction){
                    case'add':
                        $rules=[
                            'ten_khoahoc'=>'required',
                            'hinh_anh'=>'required',
                            'mo_ta'=>'required',
                            'ngay_dang'=>'required',
                            'gia_khoahoc'=>'required',
                        ];
                        break;
                    case'update':
                        $rules=[
                            'ten_khoahoc'=>'required',
                            'mo_ta'=>'required',
                            'ngay_dang'=>'required',
                            'gia_khoahoc'=>'required',
                        ];
                        break;
                    default:
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
        return[
            'ten_khoahoc.required'=>'Bạn phải nhập tên khóa học.',
            'hinh_anh.required'=>'Bạn phải thêm ảnh.',
            'mo_ta.required'=>'Bạn phải nhập mô tả.',
            'ngay_dang.required'=>'Bạn phải nhập ngày.',
            'gia_khoahoc.required'=>'Bạn phải thêm giá khóa học.'
        ];
    }
}
