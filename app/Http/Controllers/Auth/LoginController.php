<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function getLogin(){
        return view('auth.login');
    }
    public function postLogin(Request $request){
        // thực hiện vào đây
        // dd($request->all());
        // kiểm tra dữ liệu đầu vào
        $rules=[
            'email'=>'required|email',
            'password'=>'required',
        ];
        $messages=[
            'email.required'=>'Bạn phải nhập vào email',
            'email.email'=>'Email k đúng định dạng',
            'password.required'=>'Bạn phải nhập password',
            
        ];
        // kiểm tra mảng vừa khởi tạo
        $validator=Validator::make($request->all(),$rules,$messages);
        // $request->validate($rules,$messages);
        // dd($validator);
        if($validator->fails()){
            return redirect('login')->withErrors($validator);
        }
        else{
            // đón dữ liệu từ bên trang login gửi sang 
            $email=$request->input('email');
            $password=$request->input('password');
            // kiểm tra đăng nhập
            if(Auth::attempt(['email'=>$email,'password'=>$password])){
                return redirect('/home');
            }
            else{
                Session::flash('error','Email hoặc mật khẩu không đúng');
                return redirect('login');
            }
        }

    }
    public function getLogout(){
        Auth::logout();
        return redirect('login');
    }
    public function registerForm(){
        return view('auth.register');
    }
    public function postRegister(UserRequest $request){
        $method_route ='register';
            if($request->isMethod('post')){
                $params=[];
                // dd($request->file('hinh_anh'));
                $params['cols']= array_map(function($item){
                    if($item=='')
                       $item=null;     
                    if(is_string($item))
                    $item=trim($item); // lọc trước khi gửi đi
                    return $item;
                },
                $request->post());
                // dd($params['cols']['hinh_anh']);
                unset($params['cols']['_token']);
                // dd($params['cols']);
                $modelTest=new User();
                $res=$modelTest->saveNew($params);
                if($res==null){
                    redirect()->route($method_route);
                }
                elseif($res>0){
                    Session::flash('success','Đăng ký tài khoản thành công');
                }
                else{
                    Session::flash('error','Lỗi đăng ký tài khoản');
                    redirect()->route($method_route);
                }
            }
        return redirect()->route('register');

    }
    // public function register(UserRequest $request){
    //     $obj=new User();
    //     // $this->v['roles']=$obj->getRoles();
    //     // $this->v['_title']='Thêm người dùng';
    //     $method_route ='register';
    //     if($request->isMethod('post')){
    //         $params=[];
    //         // dd($request->file('hinh_anh'));
    //         $params['cols']= array_map(function($item){
    //             if($item=='')
    //                $item=null;     
    //             if(is_string($item))
    //             $item=trim($item); // lọc trước khi gửi đi
    //             return $item;
    //         },
    //         $request->post());
    //         if($request->hasFile('hinh_anh')) {
    //             $file = $request->file('hinh_anh');
    //             $fileName = $file->getClientOriginalName();
    //             // $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
    //             $filePath = $file->storeAs('public/user',$fileName);
    //             $dataAvatar = [
    //                 'fileName' => $fileName,
    //                 'file_path' => Storage::url($filePath)
    //             ];
    //         }else{
    //             $dataAvatar = [
    //                 'fileName' => '',
    //                 'file_path' => ''
    //             ];
    //         }
    //         $params['cols']['hinh_anh']=$dataAvatar['file_path'];
    //         // dd($params['cols']['hinh_anh']);
    //         unset($params['cols']['_token']);
    //         // dd($params['cols']);
    //         $modelTest=new User();
    //         $res=$modelTest->saveNew($params);
    //         if($res==null){
    //             redirect()->route($method_route);
    //         }
    //         elseif($res>0){
    //             Session::flash('success','Thêm mới người dùng thành công');
    //         }
    //         else{
    //             Session::flash('error','Lỗi thêm mới người dùng');
    //             redirect()->route($method_route);
    //         }
    //     }
    //     // dd($roles);
    //     return view('auth.register');



    // }   
}
