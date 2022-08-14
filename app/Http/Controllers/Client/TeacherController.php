<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\GiangVien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function teacher(){
        $obj=new GiangVien();
        $this->v['listGiangVien']=$obj->clientList();
        
        return view('client.teachers.teachers',$this->v);
    }
    public function detailTeacher($id){
        $obj=new GiangVien();
        $this->v['detailList']=$obj->detailList($id);
        $objKhofGv=new GiangVien();
        $this->v['query']=$objKhofGv->listKhofGiangVien($id);
        return view('client/teachers/single-teacher',$this->v);
    }
    // public function listKhofGv($id,){
    //     if(!$request->search){
    //         $params['search']=null;
    //     }
    //     $objKhofGv=new GiangVien();
    //     $this->v['query']=$objKhofGv->listKhofGiangVien($id);
    //     return view('client/khoahocs/course-category',$this->v);
    // }
}
