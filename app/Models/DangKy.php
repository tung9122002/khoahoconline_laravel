<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DangKy extends Model
{
    use HasFactory;

    protected $table='dang_ky';
    // protected $fillable=['id','name','ten_lop'];
    public function loadListWithPager($params){
        $query=DB::table('dang_ky')
        ->join('khach_hang','khach_hang.id','=','dang_ky.id_khachhang')
        ->join('lop','lop.id','=','dang_ky.id_lop')
        ->join('khoa_hoc','khoa_hoc.id','=','lop.id_khoahoc')
        ->where('khach_hang.name','LIKE','%'.$params['search'].'%')
        ->select('dang_ky.*','khach_hang.name','lop.ten_lop','khoa_hoc.ten_khoahoc');
        $list=$query->paginate(5);
        return $list;
    }
    public function saveNew($params){
        // dd($data);
        $res=DB::table('dang_ky')
        ->insertGetId($params);
        return $res;
    }
    public function loadOne($id){
        $data=DB::table('dang_ky')
        ->find($id);
        return $data;
    }
    public function updateDangKy($id,$params){
        $data=array_merge($params['cols']);
        $res=DB::table('dang_ky')
        ->where('id','=',$id)
        ->update($data);
        return $res;
    }
    public function deleteKangKy($id){
        $delete=DB::table('dang_ky')
        ->delete($id);
        return $delete;
    }
    public function dangky($id){
        $query=DB::table('khoa_hoc')
        ->find($id);
        return $query;
    }
    public function listDangky($id){
        $query=DB::table('lop')
        ->join('khoa_hoc','khoa_hoc.id','=','lop.id_khoahoc')
        ->select('lop.*','khoa_hoc.ten_khoahoc','khoa_hoc.gia_khoahoc')
        ->where('lop.id','=',$id);
        $list=$query->first();
        return $list;
    }
    public function lichsu($id){
        $query=DB::table('dang_ky')
        ->join('khach_hang','khach_hang.id','=','dang_ky.id_khachhang')
        ->join('users','users.id','=','khach_hang.id_user')
        ->join('lop','lop.id','=','dang_ky.id_lop')
        ->join('khoa_hoc','khoa_hoc.id','=','lop.id_khoahoc')
        ->where('id_user',$id)
        ->select('dang_ky.*','users.name','users.email','lop.ten_lop','khoa_hoc.ten_khoahoc','khoa_hoc.gia_khoahoc','users.dia_chi','users.sdt')
        ->get();
        $list=$query;
        return $list;
    }

}
