<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class KhuyenMai extends Model
{
    use HasFactory;
    protected $table='khuyen_mai';
    public function listKhuyemMaiWithPager($params){
        $query=DB::table('khuyen_mai')
        ->join('khoa_hoc','khoa_hoc.id','=','khuyen_mai.id_khoahoc')
        ->where('ma_khuyenmai','LIKE','%'.$params['search'].'%')
        ->select('khuyen_mai.*','khoa_hoc.ten_khoahoc');
        $list=$query->paginate(5);
        return $list;
    }
    public function saveNew($params){
        $data=array_merge($params['cols']);
        $res=DB::table('khuyen_mai')
        ->insertGetId($data);
        return $res;
    }
    public function loadOne($id){
        $query=DB::table('khuyen_mai')
        ->find($id);
        $obj=$query;
        return $obj;
    }
    public function updateKhuyenMai($id,$params){
        $data=array_merge($params['cols']);
        $res=DB::table('khuyen_mai')
        ->where('id','=',$id)
        ->update($data);
        return $res;
    }
    public function deleteKm($id){
        $delete=DB::table('khuyen_mai')
        ->delete($id);
        return $delete;
    }
}
