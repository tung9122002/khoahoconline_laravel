@extends('admin.templates.layout')
@section('title', $title)
@section('content')
    <!-- Main content -->
    <section class="content appTuyenSinh">
        <link rel="stylesheet" href="{{ asset('default/bower_components/select2/dist/css/select2.min.css')}} ">
        <style>
            .select2-container--default .select2-selection--single, .select2-selection .select2-selection--single {
                padding: 3px 0px;
                height: 30px;
            }
            .select2-container {
                margin-top: -5px;
            }

            option {
                white-space: nowrap;
            }

            .select2-container--default .select2-selection--single {
                background-color: #fff;
                border: 1px solid #aaa;
                border-radius: 0px;
            }

            .select2-container--default .select2-selection--multiple .select2-selection__choice {
                color: #216992;
            }
            .select2-container--default .select2-selection--multiple{
                margin-top:10px;
                border-radius: 0;
            }
            .select2-container--default .select2-results__group{
                background-color: #eeeeee;
            }
        </style>

        <?php //Hiển thị thông báo thành công?>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        <?php //Hiển thị thông báo lỗi?>
        @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
    @endif
            {{$title}}
    <!-- Phần nội dung riêng của action  -->
        <form class="form-horizontal " action="" method="post" enctype="multipart/form-data">
            @csrf
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="ten_de_thi" class="col-md-3 col-sm-4 control-label">Tên khóa học <span class="text-danger">(*)</span></label>

                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="ten_khoahoc" id="name" class="form-control" value="{{$query->ten_khoahoc}}">
                                <span id="mes_sdt"></span>
                                @error('ten_khoahoc')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ten_de_thi" class="col-md-3 col-sm-4 control-label">Hình ảnh <span class="text-danger">(*)</span></label>
                           
                            <div class="col-md-9 col-sm-8">
                              <input class="" type="file" name="hinh_anh" value="" id="">
                              <img src="{{asset($query->hinh_anh)}}" alt="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-sm-4 control-label">Mô tả <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="mo_ta" id="" class="form-control" value="{{$query->mo_ta}}">
                                <span id="mes_sdt"></span>
                                @error('mo_ta')
                                    <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-sm-4 control-label">Ngày đăng <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="date" name="ngay_dang" id="" class="form-control" value="{{$query->ngay_dang}}">
                                <span id="mes_sdt"></span>
                                @error('ngay_dang')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-sm-4 control-label">Số lượt xem <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="so_luot_xem" id="" placeholder="0" class="form-control" value="{{$query->so_luot_xem}}" disabled>
                                <span id="mes_sdt"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_danhmuc" class="col-md-3 col-sm-4 control-label">Id danh mục <span class="text-danger" >(*)</span> </label>
                            <div class="col-md-9 col-sm-8">
                                <select name="id_danhmuc" id="">
                                    <?php foreach($danhmucs as $it): ?>
                                    <option class="form-control" {{$query->id_danhmuc==$it->id?"selected":""}} value="<?=$it->id ?>"> <?=$it->ten_danhmuc?></option>
                                    <?php endforeach?>
                                    </select>
                                    <span id="mes_sdt"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="id_giangvien" class="col-md-3 col-sm-4 control-label">Id giảng viên <span class="text-danger" >(*)</span> </label>
                            <div class="col-md-9 col-sm-8">
                                <select name="id_giangvien" id="">
                                    <?php foreach($giangviens as $it): ?>
                                    <option class="form-control" {{$query->id_giangvien==$it->id?"selected":""}} value="<?=$it->id ?>"> <?=$it->ten_giangvien?></option>
                                    <?php endforeach?>
                                    </select>
                                    <span id="mes_sdt"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-md-3 col-sm-4 control-label">Giá khóa học <span class="text-danger">(*)</span></label>
                            <div class="col-md-9 col-sm-8">
                                <input type="text" name="gia_khoahoc" id="" placeholder="0" class="form-control" value="{{$query->gia_khoahoc}}">
                                <span id="mes_sdt"></span>
                                @error('gia_khoahoc')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary"> Save</button>
                <a href="{{ route('admin.khoahoc.index') }}" class="btn btn-default">Cancel</a>
            </div>
            <!-- /.box-footer -->
        </form>

    </section>
@endsection
@section('script')
    <script src="{{ asset('default/plugins/input-mask/jquery.inputmask.js') }}"></script>
    <script src="{{ asset('default/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
@endsection

