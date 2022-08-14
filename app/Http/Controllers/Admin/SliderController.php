<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    //
    public function __construct()
    {
        $this->v=[];
    }
    public function banner(){
        $objBanner=new Slider();
        $this->v['list']=$objBanner->loadListwithPager();
        return view('admin.slider.list_slider',$this->v);
    }
    public function add(SliderRequest $request){
        $this->v['_title']='Thêm slide';
        if($request->isMethod('post')){
            $params['cols']=$request->post();
            // if($request->hasFile('hinh_anh')) {
            //     $file = $request->file('hinh_anh');
            //     $fileName = $file->getClientOriginalName();
            //     // $fileNameHash = str::random(20) . '.' . $file->getClientOriginalExtension();
            //     $filePath = $file->storeAs('public/slide',$fileName);
            //     $dataAvatar = [
            //         'fileName' => $fileName,
            //         'file_path' => Storage::url($filePath)
            //     ];
            // }else{
            //     $dataAvatar = [
            //         'fileName' => '',
            //         'file_path' => ''
            //     ];
            // }

            // $params['cols']['hinh_anh']=$dataAvatar['file_path'];
            unset($params['cols']['_token']);
            if($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()){
                $params['cols']['hinh_anh']=$this->uploadFile($request->file('hinh_anh'));
            }
            $obj=new Slider();
            $res=$obj->saveNew($params);
            if($res==null){
                redirect()->route('admin.slider.slider_add');
            }
            elseif($res>0){
                Session::flash('success','Thêm mới thành công');
            }
            else{
                Session::flash('error','Lỗi thêm mới');
                redirect()->route('admin.slider.slider_add');
            }
        }
        return view('admin.slider.add',$this->v);
    }
    public function delete($id){
        $obj=new Slider();
        $this->v['delete']=$obj->deleteSlide($id);
        return redirect()->route('admin.slider.index');
    }
    public function edit($id){
        $this->v['_title']="Sửa Slide";
        $obj=new Slider();
        $this->v['query']=$obj->loadOne($id);
        return view('admin.slider.edit',$this->v);
    }
    public function update($id,SliderRequest $request){
        $obj=new Slider();
        $slide=$obj->loadOne($id);
        if($request->isMethod('post')){
            $params['cols']= $request->post();
            unset($params['cols']['_token']);
            if($request->hasFile('hinh_anh') && $request->file('hinh_anh')->isValid()){
                $params['cols']['hinh_anh']=$this->uploadFile($request->file('hinh_anh'));
            }
            $obj=new Slider();
            $res=$obj->updateSlider($id,$params);
        if($res==null){
            return redirect()->route('admin.slider.slider_edit',['id'=>$id]);
        }
        elseif($res==1){
            Session::flash('success','Sửa mới slider thành công');
            return redirect()->route('admin.slider.slider_edit',['id'=>$id]);
        }
        else{
            Session::flash('error','Lỗi sửa mới slider');
            return redirect()->route('admin.slider.slider_edit',['id'=>$id]);
        }
    }
    }
    public function uploadFile($file){
        // lấy thời gian hiện tại
        $fileName=time().'_'.$file->getClientOriginalName();
        return $file->storeAs('slide',$fileName,'public');
    }

}
