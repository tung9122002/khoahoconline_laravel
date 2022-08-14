<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GiangVienRequest;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class GiangVienController extends Controller
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
        $objGiangVien=new GiangVien();
        $this->v['list']=$objGiangVien->loadListWithPager($params);
        return view('admin.giangvien.index',$this->v);
    }
    public function add(GiangVienRequest $request){
        $this->v['title']='Thêm giảng viên';
        // dd($request->post());
        if($request->isMethod('post')){
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
                $filePath = $file->storeAs('public/giangvien',$fileName);
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
            unset($params['cols']['_token']);
            // dd($params['cols']);
            $modelGiangVien=new GiangVien();
            $res=$modelGiangVien->saveNew($params);
            if($res==null){
                redirect()->route('admin.giangvien.giangvien_add');
            }
            if ($res>0) {
                Session::flash('success','Thêm mới giảng viên thành công');
            } else {
                Session::flash('error','Lỗi thêm mới giảng viên !');
                redirect()->route('admin.giangvien.giangvien_add');
                # code...
            }
            
        }
        return view('admin.giangvien.add',$this->v);
    }
    public function edit($id){
        $this->v['title']='Sửa Giảng Viên';
        $obj=new GiangVien();
        $this->v['detailList']=$obj->detailList($id);
        return view('admin.giangvien.edit',$this->v);
    }
    public function update($id,GiangVienRequest $request){
        $obj=new GiangVien();
        $GiangVien=$obj->detailList($id);
        // dd($request->post());
        if($request->isMethod('post')){
            $params['cols']= $request->post();
            if($request->hasFile('hinh_anh')){
                $file=$request->file('hinh_anh');
                $fileName=$file->getClientOriginalName();
                $filePath=$file->storeAs('public/giangvien',$fileName);
                $dataAvatar=[
                    'file_path'=>Storage::url($filePath)
                ];
            }
            else{
                $dataAvatar=[
                    'file_path'=>$GiangVien->hinh_anh,
                ];
            }
            $params['cols']['hinh_anh']=$dataAvatar['file_path'];
            unset($params['cols']['_token']);
            // dd($params['cols']);
            $res=$obj->updateGiangVien($id,$params);
            if($res==null){
                return redirect()->route('admin.giangvien.giangvien_edit',['id'=>$id]);
            }
            elseif($res==1){
                Session::flash('success','Sửa mới giảng viên thành công');
                return redirect()->route('admin.giangvien.giangvien_edit',['id'=>$id]);
            }
            else{
                Session::flash('error','Lỗi sửa mới giảng viên');
                redirect()->route('admin.giangvien.giangvien_edit');
            }

        }
    }
    public function delete($id){
        $obj=new GiangVien();
        $this->v['delete']=$obj->deleteGiangVien($id);
        return redirect()->route('admin.giangvien.index');
    }
}
