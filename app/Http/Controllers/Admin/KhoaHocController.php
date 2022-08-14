<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\KhoaHocRequest;
use App\Http\Requests\UserRequest;
use App\Models\DanhMuc;
use App\Models\GiangVien;
use App\Models\KhoaHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class KhoaHocController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function index(Request $request){
        // dd($request->all());
        $params=$request->all();
        if(!$request->search){
            $params['search']=null;
        }
        $objKhoaHoc=new KhoaHoc();
        $this->v['list']=$objKhoaHoc->loadListWithPager($params);
        return view('admin.khoahoc.index',$this->v);
    }
    public function add(KhoaHocRequest $request){
        $this->v['title']='Thêm khóa học';
        $objDanhMuc=new KhoaHoc();
        $this->v['danhmucs']=$objDanhMuc->getDanhMuc();
        $objGiangVien=new KhoaHoc();
        $this->v['giangviens']=$objGiangVien->getGiangVien();
        $method_route ='khoahoc_add';
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
                $filePath = $file->storeAs('public/khoahoc',$fileName);
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
            // dd($params['cols']['hinh_anh']=$dataAvatar['file_path']);
            unset($params['cols']['_token']);
            // dd($params['cols']);
            $modelTest=new KhoaHoc();
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
        // dd($objKhoaHoc);
        return view('admin.khoahoc.add',$this->v);
    }   
    public function delete($id){
        $obj=new KhoaHoc();
        $this->v['delete']=$obj->deleteKhoaHoc($id);
        return redirect()->route('admin.khoahoc.index');
    }
    public function edit($id){
        $this->v['title']='Sửa Khóa Học';
        $obj=new KhoaHoc();
        $this->v['query']=$obj->loadOne($id);
        $this->v['danhmucs']=$obj->getDanhMuc();
        $this->v['giangviens']=$obj->getGiangVien();
        return view('admin.khoahoc.edit',$this->v);
    }
    public function update($id,KhoaHocRequest $request){
        $obj=new KhoaHoc();
        $KhoaHoc=$obj->loadOne($id);
        if($request->isMethod('post')){
            $params['cols']= $request->post();
            if($request->hasFile('hinh_anh')){
                $file=$request->file('hinh_anh');
                $fileName=$file->getClientOriginalName();
                $filePath=$file->storeAs('public/khoahoc',$fileName);
                $dataAvatar=[
                    'file_path'=>Storage::url($filePath)
                ];
            }
            else{
                $dataAvatar=[
                    'file_path'=>$KhoaHoc->hinh_anh,
                ];
            }
            $params['cols']['hinh_anh']=$dataAvatar['file_path'];
            unset($params['cols']['_token']);
            // dd($params['cols']);
            $res=$obj->updateKhoaHoc($id,$params);
            if($res==null){
                return redirect()->route('admin.khoahoc.khoahoc_edit',['id'=>$id]);
            }
            elseif($res==1){
                Session::flash('success','Sửa mới khóa học thành công');
                return redirect()->route('admin.khoahoc.khoahoc_edit',['id'=>$id]);
            }
            else{
                Session::flash('error','Lỗi sửa mới khóa học');
                redirect()->route('admin.khoahoc.khoahoc_edit');
            }
        }
    }
    public function search(Request $request){

        $data = DB::table('khoa_hoc')
        ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        ->join('giang_vien','giang_vien.id','=','khoa_hoc.id_giangvien')
        ->select('khoa_hoc.*','danh_muc.ten_danhmuc','giang_vien.ten_giangvien')
        ->where('ten_khoahoc', 'LIKE', '%'.$request->search.'%')
        ->get();
        $output ='';
        foreach($data as $row)
        {
           $output .= 
           '<tr>    
                <td>'.$row->id.'</td>
                <td>'.$row->ten_khoahoc.'</td>
                <td>'.$row->mo_ta.'</td>
                <td>'.date('d-m-Y', strtotime($row->created_at)).'</td>
                <td><img width="150px" src="'.$row->hinh_anh.'"></img></td>
                <td>'.$row->so_luot_xem.'</td>
                <td>'.$row->ten_danhmuc.'</td>
                <td>'.$row->ten_giangvien.'</td>
                <td>'.$row->gia_khoahoc.'</td>
                <td>'.$row->trang_thai.'</td>
                <td>
                '.'
                <a href="'.route('admin.khoahoc.khoahoc_edit',[$row->id]).'">'.'Sửa</a>
                '.'
                </td>
                <td>
                '.'
                <a class="delete" href="'.route('admin.khoahoc.khoahoc_delete',[$row->id]).'">'.'Xóa</a>
                '.'
                </td>

           </tr>';
       }
       return response($output);
    }
}

