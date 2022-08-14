<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KhachHang extends Model
{
    use HasFactory;
    public function loadList(){
        $query=DB::table('khach_hang')
        ->select('khach_hang.*');
        $list=$query->paginate(5);
        return $list;
    }
    public function deleteKhachHang($id){
        $delete=DB::table('khach_hang')
        ->delete($id);
        return $delete;

    }
    public function saveNew($params){
        $data=array_merge($params['cols']);
        // dd($data);
        $res=DB::table('khach_hang')
        ->insertGetId($data);
        return $res;
    }
    public function getKhachHang(){
        $khachhangs=DB::table('khach_hang')
        ->get();
        return $khachhangs;
    }
     // chi tiết tất cả các khách hàng đã đăng ký lớp
     public function detailKh($id){
        $query=DB::table('khach_hang')
        ->join('dang_ky','dang_ky.id_khachhang','=','khach_hang.id')
        ->join('lop','lop.id','=','dang_ky.id_lop')
        ->where('lop.id','=',$id)
        // ->select('lop.*','dang_ky.id_khachhang')
        ->get();
        return $query;
    }
}
