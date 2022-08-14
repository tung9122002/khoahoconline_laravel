<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Mail\OrderShipped;
use App\Models\DangKy;
use App\Models\KhachHang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class DangKyKhoaHocController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
     // hiển thị chi tiết đăng ký
     public function dangkyCourse($id){
        $obj=new DangKy();
        $this->v['list']=$obj->listDangky($id);
    return view('client.khoahocs.dangky-course',$this->v);
    }
     // đăng ký khóa học client
     public function postdangkyCourse($id,Request $request){

        // dd($request->post());
        // $modelDangKy=new DangKy();
        // // $obj=new DangKy();
        // $dangkyKh=$modelDangKy->listDangky($id);
        // dd($dangkyKh);
        try {
            DB::beginTransaction();
            if($request->isMethod('post')){
                $params=$request->post();
                $params['cols']= array_map(function($item){
                    if($item=='')
                       $item=null;     
                    if(is_string($item))
                    $item=trim($item); // lọc trước khi gửi đi
                    return $item;
                },
                $request->post());
                unset($params['cols']['_token']);
                // dd($params['cols']);
                $modelTest=new KhachHang();
                $res=$modelTest->saveNew($params);
                // dd($res);
                if($res==null){
                    redirect()->route('detailKhoaHoc',['id'=>$id]);
                }
                elseif($res>0){
                    $data=['id_khachhang'=>$res,'id_lop'=>$id];
                    $modelDangKy=new DangKy();
                    $inserts=$modelDangKy->saveNew($data);
                    if($inserts==null){
                        redirect()->route('dangkyCourse',['id'=>$id]);
                    }
                    elseif($inserts>0){
                            // Mail::to('tung9122002@gmail.com')->send(new OrderShipped(['dathang'=>$params['cols']]));
                            Session::flash('success','Đăng ký Khóa học thành công');
                            DB::commit();
                            return redirect()->route('dangkyCourse',['id'=>$id]);
                    }
                    else{
                        Session::flash('error','Lỗi đăng ký khóa học');
                        redirect()->route('dangkyCourse',['id'=>$id]);
                    }
                }
                else{
                    Session::flash('error','Lỗi đăng ký khóa học');
                    redirect()->route('dangkyCourse',['id'=>$id]);
                }
            }
    
            return redirect()->route('dangkyCourse',['id'=>$id]);
    
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return redirect()->route('dangkyCourse',['id'=>$id]);
        }
       
    }
    public function lichsuDangKy($id){
        $obj=new DangKy();
        $this->v['list']=$obj->lichsu($id);
        return view('client.khoahocs.lichsudangky',$this->v);
    }
}
