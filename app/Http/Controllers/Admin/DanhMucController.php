<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DanhMucRequest;
use App\Mail\OrderShipped;
use App\Models\DanhMuc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class DanhMucController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function index(Request $request){
        // Mail::to("tung9122002@gmail.com")->send(new OrderShipped(['ma'=>'1232311']));
        $params=$request->all();
        if(!$request->search){
           $params['search']=null;
        }
        $objDanhMuc=new DanhMuc();
        $this->v['list']=$objDanhMuc->loadListWithPager($params);
        return view('admin.danhmuc.index',$this->v);
    }

    public function add(DanhMucRequest $request){
        
        $this->v['_title']='Thêm Danh Mục';
        $method_route ='danhmuc_add';
        if($request->isMethod('post')){
            $params=$request->post();
            // dd($request->post());
            // $params['cols']= array_map(function($item){
            //     if($item=='')
            //        $item=null;     
            //     if(is_string($item))
            //     $item=trim($item); // lọc trước khi gửi đi
            //     return $item;
            // },
            // $request->post();
            unset($params['_token']);
            // dd($params['cols']);
            $modelTest=new DanhMuc();
            $res=$modelTest->saveNew($params);
            if($res==null){
                redirect()->route($method_route);
            }
            elseif($res>0){
                Session::flash('success','Thêm mới danh mục thành công');
            }
            else{
                Session::flash('error','Lỗi thêm mới danh mục');
                redirect()->route($method_route);
            }
        }
        return view('admin.danhmuc.add',$this->v);
    }
    public function delete($id){
        $obj=new DanhMuc();
        $this->v['delete']=$obj->deleteDanhMuc($id);
        return redirect()->route('admin.danhmuc.index');
    }
    public function edit($id){
        $this->v['_title']='Sửa danh mục';
        $danhmuc=new DanhMuc();
        $this->v['obj']=$danhmuc->loadOne($id);
        return view('admin.danhmuc.edit',$this->v);
    }

    public function update($id,DanhMucRequest $request){
        $danhmucs=DB::table('danh_muc')
        ->where('id','=',$id)
        ->update([
            'ten_danhmuc'=>$request->input('ten_danhmuc'),
        ]);
        // dd($danhmucs);
        return redirect()
        ->route('admin.danhmuc.index',compact('danhmucs'));
    }
    public function search(Request $request){
        $data = DB::table('danh_muc')
        ->where('ten_danhmuc', 'LIKE', '%'.$request->search.'%')
        ->get();
        $output ='';
        foreach($data as $row)
        {
           $output .= 
           '<tr>    
                <td>'.$row->id.'</td>
                <td>'.$row->ten_danhmuc.'</td>
                <td>
                '.'
                <a href="'.route('admin.danhmuc.danhmuc_edit',[$row->id]).'">'.'Sửa</a>
                '.'
                </td>
                <td>
                '.'
                <a class="delete" data_url="'.route('admin.danhmuc.danhmuc_delete',[$row->id]).'">'.'Xóa</a>
                '.'
                </td>

           </tr>';
       }
       return response($output);
    }
}
