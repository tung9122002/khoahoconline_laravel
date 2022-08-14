<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LopRequest;
use App\Models\DangKy;
use App\Models\KhachHang;
use App\Models\Lop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LopController extends Controller
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
        $objLop=new Lop();
        $this->v['list']=$objLop->loadListWithPager($params);
        return view('admin.lop.index',$this->v);
    }
    public function add(LopRequest $request){
        $this->v['title']='Thêm lớp';
        $objKhoaHoc=new Lop();
        $this->v['khoahocs']=$objKhoaHoc->getKhoaHoc();
        $objGiangVien=new Lop();
        $this->v['giangviens']=$objGiangVien->getGiangVien();
        // dd($request->post());
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
            $modelTest=new Lop();
            $res=$modelTest->saveNew($params);
            if($res==null){
                redirect()->route('admin.lop.lop_add');
            }
            elseif($res>0){
                Session::flash('success','Thêm mới danh mục thành công');
            }
            else{
                Session::flash('error','Lỗi thêm mới danh mục');
                redirect()->route('admin.lop.lop_add');
            }
        }
        return view('admin.lop.add',$this->v);
    }
    public function edit($id){
        $this->v['title']="Sửa lớp";
        $obj=new Lop();
        $this->v['query']=$obj->loadOne($id);
        $this->v['khoahocs']=$obj->getKhoaHoc();
        $this->v['giangviens']=$obj->getGiangVien();
        return view('admin.lop.edit',$this->v);
    }
    public function update($id,LopRequest $request){
        $obj=new Lop();
        if($request->isMethod('post')){
            $params['cols']=$request->post();
        }
        unset($params['cols']['_token']);
        // dd($params['cols']);
        $res=$obj->updateLop($id,$params); if($res==null){
            return redirect()->route('admin.lop.lop_edit',['id'=>$id]);
        }
        elseif($res==1){
            Session::flash('success','Sửa mới lớp thành công');
            return redirect()->route('admin.lop.lop_edit',['id'=>$id]);
        }
        else{
            Session::flash('error','Lỗi sửa mới lớp');
            return redirect()->route('admin.lop.lop_edit',['id'=>$id]);
        }
    }
    public function delete($id){
        $obj=new Lop();
        $this->v['delete']=$obj->deleteLop($id);
        return redirect()->route('admin.lop.index');
    }
    //chi tiết lớp
    public function detailLop($id){
        $obj=new KhachHang();
        $this->v['query']=$obj->detailKh($id);
        return view('admin.lop.detail-lop',$this->v);
    }
}
