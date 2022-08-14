<?php

namespace App\Http\Controllers\Admin;

use App\Console\Kernel;
use App\Http\Controllers\Controller;
use App\Http\Requests\KhuyenMaiRequest;
use App\Models\KhoaHoc;
use App\Models\KhuyenMai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class KhuyenMaiController extends Controller
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
        $obj=new KhuyenMai();
        $this->v['list']=$obj->listKhuyemMaiWithPager($params);
        return view('admin.khuyenmai.index',$this->v);
    }
    public function add(KhuyenMaiRequest $request){
        $this->v['_title']='Thêm khuyến mại';
        $obj=new KhoaHoc();
        $this->v['khoahocs']=$obj->getKhoaHoc();
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
            $modelTest=new KhuyenMai();
            $res=$modelTest->saveNew($params);
            if($res==null){
                redirect()->route('admin.khuyenmai.khuyenmai_add');
            }
            elseif($res>0){
                Session::flash('success','Thêm mới khuyến mại thành công');
            }
            else{
                Session::flash('error','Lỗi thêm mới khuyến mại');
                redirect()->route('admin.khuyenmai.khuyenmai_add');
            }
        }
        return view('admin.khuyenmai.add',$this->v);
    }
    public function edit($id){
        $this->v['_title']='Sửa khuyến mại';
        $obj=new KhuyenMai();
        $this->v['obj']=$obj->loadOne($id);
        $obj=new KhoaHoc();
        $this->v['khoahocs']=$obj->getKhoaHoc();
        return view('admin.khuyenmai.edit',$this->v);
    }
    public function update($id,KhuyenMaiRequest $request){
        $obj=new KhuyenMai();
        if($request->isMethod('post')){
            $params['cols']=$request->post();
        }
        unset($params['cols']['_token']);
        // dd($params['cols']);
        $res=$obj->updateKhuyenMai($id,$params);
        if($res==null){
            return redirect()->route('admin.khuyenmai.khuyenmai_edit',['id'=>$id]);
        }
        elseif($res==1){
            Session::flash('success','Sửa khuyến mại thành công');
            return redirect()->route('admin.khuyenmai.khuyenmai_edit',['id'=>$id]);
        }
        else{
            Session::flash('error','Lỗi sửa mới khuyến mại');
            return redirect()->route('admin.khuyenmai.khuyenmai_edit',['id'=>$id]);
        }
    }
    public function delete($id){
        $obj=new KhuyenMai();
        $this->v['delete']=$obj->deleteKm($id);
        return redirect()->route('admin.khuyenmai.index',$this->v);
    }
}
