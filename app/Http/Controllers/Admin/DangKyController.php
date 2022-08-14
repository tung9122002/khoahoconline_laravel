<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DangKy;
use App\Models\KhachHang;
use App\Models\Lop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Stmt\TryCatch;

class DangKyController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function index(Request $request){
        $params=$request->all();
        if(!$request->search){
            $params['search']=null;
        }
        $obj=new DangKy();
        $this->v['list']=$obj->loadListWithPager($params);
        return view('admin.dangky.index',$this->v);
    }
    public function add(Request $request){
        $this->v['_title']='Thêm Đăng ký Khóa Học';
        $objLop=new Lop();
        $this->v['lops']=$objLop->getLop();
        $objKhachHang=new KhachHang();
        $this->v['khachhangs']=$objKhachHang->getKhachHang();
        if($request->isMethod('post')){
            $params=$request->post();
            $params['cols']= array_map(function($item){
                if($item=='')
                   $item=null;     
                if(is_string($item))
                $item=trim($item); // lọc trước khi gửi đi
                return $item;
            },
            $request->post());
            unset($params['cols']['_token']);
            // dd($params['cols']);
            $modelTest=new DangKy();
            $res=$modelTest->saveNew($params);
            if($res==null){
                redirect()->route('admin.dang-ky.dangky_add');
            }
            elseif($res>0){
                Session::flash('success','Thêm mới đăng ký thành công');
            }
            else{
                Session::flash('error','Lỗi thêm mới đăng ký');
                redirect()->route('admin.dang-ky.dangky_add');
            }
        }
        return view('admin.dangky.add',$this->v);
    }
    public function delete($id){
        $obj=new DangKy();
        $this->v['delete']=$obj->deleteKangKy($id);
        return redirect()->back();
    }
    public function edit($id){
        $this->v['_title']='Sửa đăng ký';
        $objLop=new Lop();
        $this->v['lops']=$objLop->getLop();
        $objKhachHang=new KhachHang();
        $this->v['khachhangs']=$objKhachHang->getKhachHang();
        $obj=new DangKy();
        $this->v['data']=$obj->loadOne($id);
        return view('admin.dangky.edit',$this->v);
    }
    public function update($id,Request $request){
        // dd($request->all());
        $obj=new DangKy();
        if($request->isMethod('post')){
            $params['cols']=$request->post();
        }
        unset($params['cols']['_token']);
        // dd($params['cols']);
        $res=$obj->updateDangKy($id,$params); 
        if($res==null){
            // return redirect()->route('admin.dang-ky.dangky_edit',['id'=>$id]);
            return redirect()->route('admin.dang-ky.dangky_edit',['id'=>$id]);
        }
        elseif($res==1){
            Session::flash('success','Sửa mới đăng ký thành công');
            // return redirect()->route('admin.dang-ky.dangky_edit',['id'=>$id]);
            return redirect()->back();
        }
        else{
            Session::flash('error','Lỗi sửa mới đăng ký');
            return redirect()->route('admin.dang-ky.dangky_edit',['id'=>$id]);
        }
    }


}
