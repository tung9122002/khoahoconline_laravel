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
                        <div>
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-xs-12" style="text-align:center;">
                        <div class="form-group">
                            {{-- <button type="submit" name="btnSearch" class="btn btn-primary btn-sm "><i
                                class="fa fa-search" style="color:white;"></i> Search
                        </button> --}}
                            <a href="{{ url('admin/danhmuc') }}" class="btn btn-default btn-sm "><i class="fa fa-remove"></i>
                                Clear </a>
                            <a href="{{route('admin.danhmuc.danhmuc_add')}}" class="btn btn-info btn-sm"><i class="fa fa-user-plus" style="color:white;"></i>
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
            <?php //Hi???n th??? th??ng b??o th??nh c??ng?>
            @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
            <?php //Hi???n th??? th??ng b??o l???i?>
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
                Kh??ng c?? d??? li???u ph?? h???p
            </p>
        @endif
        <div class="box-body table-responsive no-padding">
            <form action="" method="post">
                @csrf
                <span class="pull-right">T???ng s??? b???n ghi t??m th???y: <span
                        style="font-size: 15px;font-weight: bold;">{{count($list)}}</span></span>
                <div class="clearfix"></div>
                <div class="double-scroll">
                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 50px" class="text-center">
                                #ID
                            </th>
                            <th class="text-center">T??n danh m???c</th>
                            <th class="text-center">S???a</th>
                            <th class="text-center">X??a</th>
                            {{-- <th class="text-center">Tr???ng th??i</th> --}}
                        </tr>

                        <tbody class="alldata">
                          @foreach ($list as $item)
                        <tr>
                            <td>{{$item->id}}</td>   
                            <td>{{$item->ten_danhmuc}}</td>
                            <td><a href="{{route('admin.danhmuc.danhmuc_edit',[$item->id])}}"><i class="fa-solid fa-pen-to-square"></i></a></td>
                            <td><a class="delete" data-url="{{route('admin.danhmuc.danhmuc_delete',[$item->id])}}"><i class="fa-solid fa-trash-can"></i></a></td>
                            {{-- <td>{{$item->trang_thai==1?'Active':'Inactive'}}</td> --}}
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
            {{-- ph??n trang theo danh s??ch l???c d??? li???u --}}
            {{-- {{$list->appends($extParams)->links()}} --}}
            {{$list->links()}}
        </div>
        <index-cs ref="index_cs"></index-cs>
    </section>

@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click','.delete',function(e){
        e.preventDefault()
        const url = $(this).data('url')
        Swal.fire({
  title: 'B???n c?? mu???n x??a?',
//   text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'X??a'
}).then((result) => {
  if (result.isConfirmed) {
    window.location=url
    Swal.fire(
      '???? X??a!',
      'X??a th??nh c??ng.',
      'success'
    )
  }
})
    })
   
</script>
@endsection
{{-- search ajax --}}
{{-- @section('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
     $('#search').keyup(function(){ //b???t s??? ki???n keyup khi ng?????i d??ng g?? t??? kh??a tim ki???m
      $value = $(this).val(); //l???y g??a tr??? ng d??ng g??
       var _token = $('input[name="_token"]').val(); // token ????? m?? h??a d??? li???u
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
        url:"{{ route('admin.danhmuc.search') }}", // ???????ng d???n khi g???i d??? li???u ??i 'search' l?? t??n route m??nh ?????t b???n m??? route l??n xem l?? hi???u n?? l?? c??i j.
        data:{'search':$value},
        success:function(data){ //d??? li???u nh???n v???
            
         $('#Content').html(data);  //nh???n d??? li???u d???ng html v?? g??n v??o c???p th??? c?? id l?? countryList
       }
     });
    });
  
    //  $(document).on('click', 'li', function(){  
    //   $('#country_name').val($(this).text());  
    //   $('#countryList').fadeOut();  
    // }); 
  </script>
@endsection --}}
