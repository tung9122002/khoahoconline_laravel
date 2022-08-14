<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DanhMucRequest extends FormRequest
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
        $arranAction=$this->route()->getActionMethod();
        // dd($arranAction); //lấy ra phương thức add
        switch($this->method()){
            case'POST':
                switch($arranAction){
                    case'add':
                        $rules=[
                            'ten_danhmuc'=>'required',
                        ];
                        break;
                    case'update':
                        $rules=[
                            'ten_danhmuc'=>'required',
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
            'ten_danhmuc.required'=>'Bạn phải nhập tên danh mục.'
        ];
    }
}
