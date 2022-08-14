@extends('client.templates.layout')
@section('content')
    <!-- header -->
    <header class="single-header">
        <!-- Start: Header Content -->
        <div class="container">
            <div class="row text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-sm-12">
                    <!-- Headline Goes Here -->
                    <h3>Contact Us</h3>
                    <h4><a href="index-2.html"> Home </a> <span> &vert; </span> Contact </h4>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </header>
    <!--/. header -->

     <!-- Start: Featured Courses Section
    ==================================================-->
    <section class="feat-course-section course-page">
    <div class="container">
        <!-- Start: Heading -->
        <div class="base-header">
            <h3> Khóa học </h3>
        </div>
        <!-- End: Heading -->
        <div class="row">
          @foreach ($list as $item)
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="feat_course_item">
                <img src="{{asset($item->hinh_anh)}}" alt="image">
                <div class="feat_cour_price">
                    <span class="feat_cour_tag"> {{$item->ten_danhmuc}} </span>
                    <span class="feat_cour_p">{{number_format($item->gia_khoahoc,0,',','.')}} $</span>
                </div>
                <h4 class="feat_cour_tit"> {{$item->ten_khoahoc}}</h4>
                <div class="feat_cour_lesson">
                    <span class="feat_cour_stu"> <i class="pe-7s-add-user"></i>  {{$item->ten_giangvien}}</span>
                </div>
                <div class="feat_cour_rating">
                    <span class="feat_cour_rat">
                        4.7
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        (4,5609)
                    </span>
                    <a href="{{route('detailKhoaHoc',[$item->id])}}"> <i class="arrow_right"></i> </a>
                </div>
            </div>
        </div>
          @endforeach
        </div>
        <!-- /. row -->
        <div class="base-header">
            {{-- phân trang theo danh sách lọc dữ liệu --}}
            {{-- {{$list->appends($extParams)->links()}} --}}
            {{$list->links()}}
    </div>
    <!-- /. container -->
    </section>
    <!-- End: Featured Courses Section
    ==================================================-->

@endsection