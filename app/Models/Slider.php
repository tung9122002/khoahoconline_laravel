<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slider extends Model
{
    use HasFactory;
    protected $table='slider';
    protected $fillable=['id','tieu_de','mo_ta','hinh_anh'];
    public function loadListwithPager(){
        $query=DB::table($this->table)
        ->select($this->fillable);
        $list=$query->paginate(5);
        return $list;
        
    }
    public function listSlider(){
        $slider=DB::table('slider')
        ->get();
        return $slider;
    }
    public function saveNew($params){
    $data=array_merge($params['cols']);
    $res=DB::table('slider')
    ->insertGetId($data);
    return $res;
    }
    public function loadOne($id){
        $query=DB::table('slider')
        ->find($id);
        return $query;
    }
    public function updateSlider($id,$params){
        $data=array_merge($params['cols']);
        $res=DB::table('slider')
        ->where('id','=',$id)
        ->update($data);
        return $res;
    }
    public function deleteSlide($id){
        $delete=DB::table('slider')
        ->delete($id);
        return $delete;
    }
}
