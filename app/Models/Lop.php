<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Lop extends Model
{
    use HasFactory;
    protected $table='lop';
    public function loadListWithPager($params){
        $query=DB::table('lop')
        ->join('khoa_hoc','khoa_hoc.id','=','lop.id_khoahoc')
        ->join('giang_vien','giang_vien.id','=','lop.id_giangvien')
        ->where('ten_lop','LIKE','%'.$params['search'].'%')
        ->select('lop.*','khoa_hoc.ten_khoahoc as khoahoc','giang_vien.ten_giangvien as giangvien');
        $list=$query->paginate(5);
        return $list;
    }
    public function getKhoaHoc(){
        $khoahocs=DB::table('khoa_hoc')
        ->get();
        return $khoahocs;
    }
    public function getGiangVien(){
        $giangviens=DB::table('giang_vien')
        ->get();
        return $giangviens;
    }
    public function saveNew($params){
        $data=array_merge($params['cols']);
        // dd($params);
        $res=DB::table($this->table)
        ->insertGetId($data);
        return $res;
    }
    public function loadOne($id){
        $query=DB::table('lop')
        ->find($id);
        return $query;
    }
    public function updateLop($id,$params){
        $data=array_merge($params['cols']);
        $res=DB::table('lop')
        ->where('id','=',$id)
        ->update($data);
        return $res;
    }
    public function deleteLop($id){
        $delete=DB::table('lop')
        ->delete($id);
        return $delete;
    } 
    public function getLop(){
        $lops=DB::table('lop')
        ->get();
        return $lops;
    }
}

