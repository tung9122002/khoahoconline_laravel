<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class GiangVien extends Model
{
    use HasFactory;
    protected $table='giang_vien';
    protected $fillable=['id','ten_giangvien','hinh_anh','dia_chi','sdt','email','mo_ta'];

    // danh sách giảng viên - Admin/GiangVienController-function index
    public function loadListWithPager($params){
        $query=DB::table($this->table)
        ->where('deleted_at',null)
        ->where('ten_giangvien','LIKE','%'.$params['search'].'%')
        ->select($this->fillable);
        $list=$query->paginate(5);
        return $list;
    }
    // tạo giảng viên - Admin/GiangVienController-function add
    public function saveNew($params){
        $data=array_merge($params['cols']);
        $res=DB::table($this->table)
        ->insertGetId($data);
        return $res;
    }
     // danh sách giảng viên - Client\TeacherController-function teacher
    public function clientList(){
        $listGiangVien=DB::table('giang_vien')
        ->where('deleted_at',null)
        // ->join('khoa_hoc','khoa_hoc.id_giangvien','=','giang_vien.id')
        ->select('giang_vien.*')
        ->get();
        return $listGiangVien;
    }
    // chi tiết giảng viên - Client/TeacherController-function detailTeacher
    // chi tiết giảng viên - admin/GiangvienController
    public function detailList($id){
        $detailList=DB::table($this->table)
        // ->join('khoa_hoc','khoa_hoc.id_giangvien','=','giang_vien.id')
        // ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        // ->select('khoa_hoc.*','khoa_hoc.hinh_anh as hinh','giang_vien.*','danh_muc.*')
        // ->where('giang_vien.id','=',$id)
        ->find($id);
        return $detailList;
    } 
    // hiển thị danh sách khóa học của id giảng viên - Client
    public function listKhofGiangVien($id){
        $query=DB::table('khoa_hoc')
        ->join('danh_muc','danh_muc.id','=','khoa_hoc.id_danhmuc')
        ->where('id_giangvien','=',$id)
        ->select('khoa_hoc.*','danh_muc.ten_danhmuc')
        ->get();
        return $query;
    }
    public function deleteGiangVien($id){
        $delete=DB::table('giang_vien')
        ->where('id',$id)
        ->update(['deleted_at'=>date('Y-m-d')]);
        return $delete;
    }
    public function updateGiangVien($id,$params){
        $data=array_merge($params['cols']);
        $res=DB::table('giang_vien')
        ->where('id','=',$id)
        ->update($data);
        return $res;
    }
}
