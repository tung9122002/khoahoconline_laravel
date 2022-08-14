<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KhuyenMaiRequest extends FormRequest
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
        switch ($this->method()) {
            case'POST':
                switch($curanAction){
                    case'add':
                        $rules=[
                            'ma_khuyenmai'=>'required',
                            'giam_tien'=>'required',
                            'created_at'=>'required',
                            'ngay_ket_thuc'=>'required',
                        ];
                        break;
                    case'update':
                        $rules=[
                            'ma_khuyenmai'=>'required',
                            'giam_tien'=>'required',
                            'created_at'=>'required',
                            'ngay_ket_thuc'=>'required',
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
            'ma_khuyenmai.required'=>'Bạn phải nhập mã',
            'giam_tien.required'=>'Bạn phải nhập mã',
            'created_at.required'=>'Bạn phải nhập mã',
            'ngay_ket_thuc.required'=>'Bạn phải nhập mã',
        ];
    }
}
