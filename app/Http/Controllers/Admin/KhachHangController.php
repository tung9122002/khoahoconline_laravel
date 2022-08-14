<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KhachHangController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function index(){
        $obj=new KhachHang();
        $this->v['list']=$obj->loadList();
        return view('admin.khachhang.index',$this->v);
    }
    public function delete($id){
        $obj=new KhachHang();
        $this->v['delete']=$obj->deleteKhachHang($id);
        return redirect()->route('admin.khachhang.index');
        }
}
