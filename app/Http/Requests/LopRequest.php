<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LopRequest extends FormRequest
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
                            'ten_lop'=>'required',
                            'so_luong_sv'=>'required',
                        ];
                        break;
                    case'update':
                        $rules=[
                            'ten_lop'=>'required',
                            'so_luong_sv'=>'required',
                        ];
                    default:
                        break;
                }
                break;
            default:
                ;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            //
            'ten_lop.required'=>'Bạn phải nhập tên lớp.',
            'so_luong_sv.required'=>'Bạn phải nhập số lượng sinh viên.',
        ];
    }
}
