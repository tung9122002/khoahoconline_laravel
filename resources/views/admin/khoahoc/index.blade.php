@extends('admin.templates.layout')
@section('title', 'Admin')
@section('css')
    <style>
        body {
            /*-webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;*/
            user-select: none;
        }

        .toolbar-box form .btn {
            /*margin-top: -3px!important;*/
        }

        .select2-container {
            margin-top: 0;
        }

        .select2-container--default .select2-selection--multiple {
            border-radius: 0;
        }

        .select2-container .select2-selection--multiple {
            min-height: 30px;
        }

        .select2-container .select2-search--inline .select2-search__field {
            margin-top: 3px;
        }

        .table > tbody > tr.success > td {
            background-color: #009688;
            color: white !important;
        }

        .table > tbody > tr.success > td span {
            color: white !important;
        }

        .table > tbody > tr.success > td span.button__csentity {
            color: #333 !important;
        }

        /*.table>tbody>tr.success>td i{*/
        /*    color: white !important;*/
        /*}*/
        .text-silver {
            color: #f4f4f4;
        }

        .btn-silver {
            background-color: #f4f4f4;
            color: #333;
        }

        .select2-container--default .select2-results__group {
            background-color: #eeeeee;
        }
    </style>
@endsection
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        {{--        @include('templates.header-action')--}}
        <div class="clearfix"></div>
        <div style="border: 1px solid #ccc;margin-top: 10px;padding: 5px;">
            <form action="" method="get">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <input type="search" name="search" id="search" class="form-control" placeholder="Search"
                                   value="">
                        </div>
                        <div><button type="submit" class="btn btn-primary">Search</button></div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12" style="text-align:center;">
                        <div class="form-group">
                            {{-- <button type="submit" name="btnSearch" class="btn btn-primary btn-sm "><i
                                    class="fa fa-search" style="color:white;"></i> Search
                            </button> --}}
                            <a href="{{ url('/user') }}" class="btn btn-default btn-sm "><i class="fa fa-remove"></i>
                                Clear </a>
                            <a href="{{route('admin.khoahoc.khoahoc_add')}}" class="btn btn-info btn-sm"><i class="fa fa-user-plus" style="color:white;"></i>
                                Add new</a>
                        </div>
                    </div>
                </div>

            </form>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Main content -->
    <section class="content appTuyenSinh">
        <div id="msg-box">
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
        </div>
        @if(count($list)<=0)
            <p class="alert alert-warning">
                Không có dữ liệu phù hợp
            </p>
        @endif
        <div class="box-body table-responsive no-padding">
            <form action="" method="post">
                @csrf
                <span class="pull-right">Tổng số bản ghi tìm thấy: <span
                        style="font-size: 15px;font-weight: bold;">{{count($list)}}</span></span>
                <div class="clearfix"></div>
                <div class="double-scroll">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 50px" class="text-center">
                                #ID
                            </th>
                            <th class="text-center">Tên khóa học</th>
                            <th class="text-center">Mô tả</th>
                            <th class="text-center">Ngày đăng</th>
                            <th class="text-center">Hình ảnh</th>
                            <th class="text-center">Số lượt xem</th>
                            <th class="text-center">Tên danh mục</th>
                            <th class="text-center">Tên giảng viên</th>
                            <th class="text-center">Giá khóa học</th>
                            <th class="text-center">Trạng thái</th>
                            <th class="text-center">Sửa</th>
                            <th class="text-center">Xóa</th>
                        </tr>

                        <tbody class="alldata">
                          @foreach ($list as $item)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$item->ten_khoahoc}}</td>
                            <td>{{$item->mo_ta}}</td>
                            <td>{{$item->ngay_dang}}</td>
                            <td>
                            <center><img src="{{asset($item->hinh_anh)}}" width="150px" alt="">
                            </center> 
                            </td>
                            <td>{{$item->so_luot_xem}}</td>
                            <td>{{$item->ten_danhmuc}}</td>
                            <td>{{$item->ten_giangvien}}</td>
                            <td>{{$item->gia_khoahoc}}</td>
                            <td>{{$item->trang_thai==1?'Active':'Inactive'}}</td>
                            <td>
                                <a href="{{route('admin.khoahoc.khoahoc_edit',[$item->id])}}"><i class="fa-solid fa-pen-to-square"></i></a>
                            </td>
                            <td>
                                <a onclick="confirm('Xóa khóa học thành công!')" href="{{route('admin.khoahoc.khoahoc_delete',[$item->id])}}"><i class="fa-solid fa-trash-can"></i></a>
                            </td>
                        </tr>
                          @endforeach
                        </tbody>
                        <tbody id="Content" class="searchdata"></tbody>

                    </table>
                </div>
            </form>
        </div>
        <br>
        <div class="text-center">
            {{-- phân trang theo danh sách lọc dữ liệu --}}
            {{-- {{$list->appends($extParams)->links()}} --}}
            {{$list->links()}}
        </div>
        <index-cs ref="index_cs"></index-cs>
    </section>

@endsection
{{-- search ajax --}}
{{-- @section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
     $('#search').keyup(function(){ //bắt sự kiện keyup khi người dùng gõ từ khóa tim kiếm
      $value = $(this).val(); //lấy gía trị ng dùng gõ
       var _token = $('input[name="_token"]').val(); // token để mã hóa dữ liệu
       if($value){
        $('.alldata').hide();
        $('.searchdata').show();
       }
       else{
        $('.alldata').show();
        $('.searchdata').hide();
       }
       $.ajax({
        type:'get',
        url:"{{ route('admin.khoahoc.search') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
        data:{'search':$value},
        success:function(data){ //dữ liệu nhận về
            
         $('#Content').html(data);  //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
       }
     });
    });
  
    //  $(document).on('click', 'li', function(){  
    //   $('#country_name').val($(this).text());  
    //   $('#countryList').fadeOut();  
    // }); 
  </script>
  
@endsection --}}

