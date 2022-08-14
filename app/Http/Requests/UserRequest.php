<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
        $curranAction=$this->route()->getActionMethod();
        // dd($curranAction); // tên phương thức add
        // trả về phương thức post, get
        switch($this->method()){
            case'POST':
                switch($curranAction){
                    case'add':
                        $rules=[
                            'name'=>'required',
                            'email'=>'required|email|unique:users',
                            'hinh_anh'=>'required',
                            'password'=>'required|min:6',
                            'sdt'=>'required',
                            'id_role'=>'required',
                        ];
                        break;
                    case'postRegister':
                        $rules=[
                            'name'=>'required',
                            'email'=>'required|email|unique:users',
                            'password'=>'required|min:6',
                            'sdt'=>'required',
                        ];
                        break;
                    case'update':
                        $rules=[
                            'name'=>'required',
                            'email'=>'required|email|unique:users,email,'.$request->id,
                            'password'=>'required|min:6',
                            'sdt'=>'required',
                            'id_role'=>'required',
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
                'name.required'=>'Bạn phải nhập tên.',
                'email.required'=>'Bạn phải nhập email.',
                'email.unique'=>'Email đã tồn tại',
                'sdt.required'=>'Bạn phải nhập sđt',   
                'hinh_anh.required'=>'Bạn phải thêm hình ảnh',
                'password.required'=>'Bạn phải nhập password',
                'password.min'=>'Password phải 6 ký tự trở lên',      
        ];

        }
    }
