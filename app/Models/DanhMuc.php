<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DanhMuc extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='danh_muc';
    protected $fillable=['id','ten_danhmuc'];
    public function loadListWithPager($params){
        $query=DB::table($this->table)
        ->where('deleted_at',null)
        ->where('ten_danhmuc','LIKE','%'.$params['search'].'%')
        ->select($this->fillable);
        $list=$query->paginate(5);
        return $list;
    }

    public function saveNew($params){
        // dd($data=$params);
        $data=$params;
        $res=DB::table($this->table)->insertGetId($data);
        return $res;
    }
    public function deleteDanhMuc($id){
        $delete=DB::table('danh_muc')
        ->where('id',$id)
        ->update(['deleted_at'=>date('Y-m-d')]);
        return $delete;
    }
    public function loadOne($id){
        $query=DB::table($this->table)
        ->find($id);
        $obj=$query;
        return $obj;
    }
    // hiển thị tất cả danh mục - client\Course
    public function listCategoryKh(){
        $query=DB::table('danh_muc')
        ->where('deleted_at',null)
        ->select('id','ten_danhmuc')
        ->get();
        $listCategory=$query;
        return $listCategory;
    }
}
