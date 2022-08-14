<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DanhMuc;
use App\Models\KhoaHoc;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    //
    protected $fillable=['khoa_hoc.id','so_luot_xem','ten_danhmuc','ten_giangvien','ten_khoahoc','gia_khoahoc','khoa_hoc.hinh_anh','khoa_hoc.mo_ta','ngay_dang','trang_thai'];
    public function __construct()
    {
        $this->v=[];
    }
    public function index(){
        $sliders=new Slider();
        $this->v['slider']=$sliders->listSlider();
        $danhmucs=new DanhMuc();
        $this->v['listCategory']=$danhmucs->listCategoryKh();
        $khoahocs=new KhoaHoc();
        $this->v['list']=$khoahocs->homeKhoaHoc();
        // $giangviens=DB::table('giang_vien')
        // ->get();
        return view('client.trangchu.index',$this->v);
    }

}
