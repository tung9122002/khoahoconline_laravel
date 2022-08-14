<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $curranAction=$this->route()->getActionMethod();
        // dd($curranAction);
        switch ($this->method()) {
            case 'POST':
                switch ($curranAction) {
                    case 'add':
                        # code...
                        $rules=[
                            'tieu_de'=>'required',
                            'mo_ta'=>'required',
                            'hinh_anh'=>'required',
                        ];
                        break;
                    case 'update':
                        $rules=[
                            'tieu_de'=>'required',
                            'mo_ta'=>'required',
                            'hinh_anh'=>'required',
                        ];
                        break;
                    
                    default:
                        # code...
                        break;
                }
                # code...
                break;
            
            default:
                # code...
                break;
        }
        return $rules;
    }
    public function messages()
    {
        return [
            //
            'tieu_de.required'=>'Bạn phải nhập tiêu đề',
            'mo_ta.required'=>'Bạn phải nhập mô tả',
            'hinh_anh.required'=>'Bạn phải nhập hình ảnh',
        ];
    }
}
