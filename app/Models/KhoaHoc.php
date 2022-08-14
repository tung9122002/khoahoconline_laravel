<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KhoaHoc extends Model
{
    use HasFactory;
    protected $table='khoa_hoc';
    protected $fillable=['khoa_hoc.id','so_luot_xem','ten_danhmuc','ten_giangvien','ten_khoahoc','gia_khoahoc','khoa_hoc.hinh_anh','khoa_hoc.mo_ta','ngay_dang','trang_thai'];
    public function loadListWithPager($params=[]){
        // dd($params);
        $query=DB::table('khoa_hoc')
        ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        // ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        ->join('giang_vien','giang_vien.id','=','khoa_hoc.id_giangvien')
        ->where('ten_khoahoc','LIKE','%'.$params['search'].'%')
        ->select($this->fillable);
        if(isset($params['id_giangvien'])){
            $list=$query->where('khoa_hoc.id_giangvien',$params['id_giangvien'])
            ->paginate(6);
        }
        else{
            $list=$query->paginate(6);
        }
        if(isset($params['id_danhmuc'])){
            $list=$query ->where('khoa_hoc.id_danhmuc',$params['id_danhmuc'])
            ->paginate(6);
        }
        return $list;
    }
    public function getDanhMuc(){
        $danhmucs=DB::table('danh_muc')
        ->get();
        return $danhmucs;
    }
    public function getGiangVien(){
        $giangviens=DB::table('giang_vien')
        ->get();
        return $giangviens;
    }
    public function saveNew($params){
        // array_merge nối nhiều mảng thành một mảng
        $data=array_merge($params['cols']);
        // dd($data);
        $res=DB::table($this->table)
        ->insertGetId($data);
        return $res;
    }

    // danh sách tất cả khóa học -Client/Courses
    public function listKh(){
        $query=DB::table('khoa_hoc')
        ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        // ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        ->join('giang_vien','giang_vien.id','=','khoa_hoc.id_giangvien')
        ->select($this->fillable);
        $list=$query->paginate(9);
        return $list;
    }
    // hiển thị tất cả danh mục - client\Course
    public function listCategoryKh(){
        $query=DB::table('danh_muc')
        ->where('deleted_at',null)
        ->select('ten_danhmuc')
        ->get();
        $list=$query;
        return $list;
    }
    // xóa id khóa học - admin/
    public function deleteKhoaHoc($id){ 
        $delete=DB::delete("DELETE FROM khoa_hoc where id=?",[$id]);
        return $delete;
    }
    // hiển thị tiết khóa học
    public function loadOne($id){
        $query=DB::table('khoa_hoc')
        ->find($id);
        return $query;
    }
    public function updateKhoaHoc($id,$params){
        $data=array_merge($params['cols']);
        $res=DB::table('khoa_hoc')
        ->where('id','=',$id)
        ->update($data);
        return $res;
    }
    public function detailKhoaHoc($id){
        $query=DB::table('khoa_hoc')
        ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        ->join('giang_vien','giang_vien.id','=','khoa_hoc.id_giangvien')
        ->join('lop','lop.id_khoahoc','=','khoa_hoc.id')
        ->where('khoa_hoc.id','=',$id)
        ->select('khoa_hoc.*','danh_muc.ten_danhmuc','giang_vien.ten_giangvien','giang_vien.hinh_anh as hinh','lop.ten_lop','lop.so_luong_sv')
        ->first();
        $list=$query;
        return $list;
    }
    public function listLopofKh($id){
        $query=DB::table('lop')
        ->join('giang_vien','giang_vien.id','=','lop.id_giangvien')
        ->join('khoa_hoc','khoa_hoc.id','=','lop.id_khoahoc')
        // ->where('lop.id_giangvien','=',$id)
        ->where('id_khoahoc','=',$id)
        ->select('lop.*','giang_vien.ten_giangvien')
        ->get();
        return $query;
    }  
    public function getKhoaHoc(){
        $khoahocs=DB::table('khoa_hoc')
        ->get();
        return $khoahocs;
    }
    public function homeKhoaHoc(){
        $list=DB::table('khoa_hoc')
        ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        ->join('giang_vien','giang_vien.id','=','khoa_hoc.id_giangvien')
        ->select($this->fillable)
        ->orderBy('khoa_hoc.id','desc')
        ->paginate(6);
        return $list;
    }
}
