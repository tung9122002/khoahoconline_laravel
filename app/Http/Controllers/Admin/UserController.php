<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Mail\OrderShipped;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function index(Request $request){
        // return "Hello World";
        // dd($request->search);
        $params=$request->all();
        $this->v['extParams']=$request->all();
        if(!$request->search){
            $params['search']=null;
        }
        $objTest=new User();
        $this->v['list']=$objTest->loadListWithPager($params);
        // dd($request->search)
        return view('admin.user.index',$this->v);
    }
    public function add(UserRequest $request){
        $obj=new User();
        $this->v['roles']=$obj->getRoles();
        $this->v['_title']='Thêm người dùng';
        $method_route ='route_BackEnd_Users_Add';
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
            if($request->hasFile('hinh_anh')) {
                $file = $request->file('hinh_anh');
                $fileName = $file->getClientOriginalName();
                // $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
                $filePath = $file->storeAs('public/user',$fileName);
                $dataAvatar = [
                    'fileName' => $fileName,
                    'file_path' => Storage::url($filePath)
                ];
            }else{
                $dataAvatar = [
                    'fileName' => '',
                    'file_path' => ''
                ];
            }
            $params['cols']['hinh_anh']=$dataAvatar['file_path'];
            // dd($params['cols']['hinh_anh']);
            unset($params['cols']['_token']);
            // dd($params['cols']);
            $modelTest=new User();
            $res=$modelTest->saveNew($params);
            if($res==null){
                redirect()->route($method_route);
            }
            elseif($res>0){
                Session::flash('success','Thêm mới người dùng thành công');
            }
            else{
                Session::flash('error','Lỗi thêm mới người dùng');
                redirect()->route($method_route);
            }
        }
        // dd($roles);
        return view('admin.user.add',$this->v);



    }   
    public function delete($id){
        $obj=new User();
        $this->v['delete']=$obj->deleteUser($id);
        return redirect()->route('admin.user.index');
    }
    public function edit($id){
        $objRole=new User();
        $this->v['roles']=$objRole->getRoles();
        $this->v['_title']='Sửa Người dùng';
        $objUser=new User();
        $this->v['obj']=$objUser->loadOne($id);
        return view('admin.user.edit',$this->v);
    }
    public function update($id,UserRequest $request){
        $objUser=new User();
        $user=$objUser->loadOne($id);
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
        if($request->hasFile('hinh_anh')) {
            $file = $request->file('hinh_anh');
            $fileName = $file->getClientOriginalName();
            // $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/user',$fileName);
            $dataAvatar = [
                'fileName' => $fileName,
                'file_path' => Storage::url($filePath)
            ];
        }else{
            $dataAvatar = [
                'fileName' => '',
                'file_path' => $user->hinh_anh,
            ];
        }
        $params['cols']['hinh_anh']=$dataAvatar['file_path'];
        // dd($params['cols']['hinh_anh']);
        unset($params['cols']['_token']);
        $params['cols']['password']=Hash::make($params['cols']['password']);
        // dd($params['cols']);
        $res=$objUser->updateUser($id,$params);
         if($res==null){
            return redirect()->route('admin.user.user_edit',$id);
        }
        elseif($res==1){
            Session::flash('success','Sửa mới người dùng thành công');
            return redirect()->route('admin.user.user_edit',['id'=>$id]);
        }
        else{
            Session::flash('error','Lỗi sửa mới người dùng');
            redirect()->route('admin.user.index');
        }
    }

}
