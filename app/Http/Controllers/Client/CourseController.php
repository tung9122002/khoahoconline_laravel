<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\DangKy;
use App\Models\DanhMuc;
use App\Models\GiangVien;
use App\Models\KhachHang;
use App\Models\KhoaHoc;
use App\Models\KhuyenMai;
use App\Models\Lop;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function listKhoaHoc(){
        $obj=new KhoaHoc();
        $this->v['list']=$obj->listKh();
        return view('client.khoahocs.courses',$this->v);
    }
    public function categoryKhoaHoc(Request $request){
        // danh mục
        // dd($request->all());
        $params=$request->all();
        $obj=new DanhMuc();
        $this->v['listCategory']=$obj->listCategoryKh();
        // giảng viên
        $objGiangVien=new GiangVien();
        $this->v['listGiangVien']=$objGiangVien->clientList();
        // khóa học
        if(!$request->search){
            $params['search']=null;
        }
        if(!$request->id_giangvien){
            $params['id_giangvien']=null;
        }
        if(!$request->id_danhmuc){
            $params['id_danhmuc']=null;
        }
        $objKhoaHoc=new KhoaHoc();
        $this->v['list']=$objKhoaHoc->loadListWithPager($params);
        
        return view('client.khoahocs.course-category',$this->v);
    }
    public function detailKhoaHoc($id){
        $obj=new KhoaHoc();
        // $query=$obj->loadOne($id);
        $objKh=$obj->detailKhoaHoc($id);
        // dd($query);
        // $this->v['query']=$query;
        $this->v['list']=$objKh;
        $objLop=new KhoaHoc();
        $this->v['query']=$objLop->listLopofKh($id);
        
        return view('client.khoahocs.single-course',$this->v);
    }
    public function checkKhuyenMai(Request $request){
        $data=$request->all();
        // dd($data); 
        $khuyenmai=DB::table('khuyen_mai')
        ->where('ma_khuyenmai',$data['ma_khuyenmai'])
        ->first();
        // dd($khuyenmai);
        if($khuyenmai){
                $khuyenmai_session=Session::get('ma_khuyenmai');
                if($khuyenmai_session==true){
                    $is_avaiable=0;
                    // nếu tồn tại
                    if($is_avaiable==0){
                        $cou[]=array(
                            'ma_khuyenmai'=>$khuyenmai->ma_khuyenmai,
                            'giam_tien'=>$khuyenmai->giam_tien,
                        );
                        //đặt session
                        Session::put('khuyenmai',$cou);
                    }
                }
                else{
                    $cou[]=array(
                        'ma_khuyenmai'=>$khuyenmai->ma_khuyenmai,
                        'giam_tien'=>$khuyenmai->giam_tien,
                    );
                    Session::put('khuyenmai',$cou);
                }
                Session::save();
                return redirect()->back()->with('success','Thêm mã khuyến mại thành công');
        }
        else{
            return redirect()->back()->with('error','Mã khuyến mãi không có');
        }
    }

}
