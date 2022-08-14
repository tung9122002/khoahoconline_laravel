@extends('client.templates.layout')
@section('content')
     <!-- header -->
     <header class="single-header">
        <!-- Start: Header Content -->
        <div class="container">
            <div class="row text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-sm-12">
                    <!-- Headline Goes Here -->
                    <h3>Instructor Details</h3>
                    <h4><a href="index-2.html"> Home </a> <span> &vert; </span> Instructor Details </h4>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </header>
    <!--/. header -->
     <!-- Start: Teacher Section
==================================================-->
<section class="single-teacher-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-12">
                <div class="teacher_left">
                    <div class="teacher_avatar">
                        <img src="{{asset($detailList->hinh_anh)}}" alt="">
                        <h3> {{$detailList->ten_giangvien}} </h3>
                        <span> Web Devekoper</span>
                        <span> Email: {{$detailList->email}}</span>
                        <span> Sđt: {{$detailList->sdt}} </span>
                    </div>
                    <div class="teacher_social">
                        <a href="#" class="fab fa-facebook-f"></a>
                        <a href="#" class="fab fa-linkedin"></a>
                        <a href="#" class="fab fa-twitter"></a>
                        <a href="#" class="fab fa-youtube"></a>
                    </div>
                    <div class="teacher_achieve">
                        <div class="teacher_achieve_list">
                            <i class="fal fa-user-friends"></i>
                            <h3> 56,890 </h3>
                            <span> Students </span>
                        </div>
                        <div class="teacher_achieve_list">
                            <i class="fal fa-star"></i>
                            <h3> 5.0 </h3>
                            <span> Rating </span>
                        </div>
                        <div class="teacher_achieve_list">
                            <i class="fal fa-book-open"></i>
                            <h3> 80 </h3>
                            <span> Courses </span>
                        </div>
                    </div>
                    <div class="teacher_about">
                        <h3> Giới thiệu</h3>
                        <p>{{$detailList->mo_ta}}</p>
                    </div>
                </div>
            </div>
            <!-- /. col-lg-4 col-md-5 col-sm-12 -->

            <div class="col-lg-8 col-md-7 col-sm-12 teach_course_tab">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="course-tab" data-bs-toggle="tab"
                            data-bs-target="#course" type="button" role="tab" aria-controls="course"
                            aria-selected="true">Course List </button>
                    </li>
                    {{-- <!-- end: ourse-tab -->
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                            type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews</button>
                    </li> --}}
                    <!-- end: reviews-tab -->
                </ul>
                <!-- End:  nav-tabs -->
                {{-- {{dd($detailList)}}  --}}
                {{-- {{dd($query)}} --}}
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="course" role="tabpanel" aria-labelledby="course-tab">
                        <div class="row teacher_course">
                            @foreach ($query as $item)
                            <div class="col-lg-6 col-sm-12">
                                <div class="feat_course_item">
                                    <img src="{{asset($item->hinh_anh)}}" alt="image">
                                    <div class="feat_cour_price">
                                        <span class="feat_cour_tag"> {{$item->ten_danhmuc}} </span>
                                        <span class="feat_cour_p"> {{number_format($item->gia_khoahoc,0,',','.')}} $ </span>
                                    </div>
                                    <h4 class="feat_cour_tit"> {{$item->ten_khoahoc}}</h4>
                                    <div class="feat_cour_lesson">
                
                                        <span class="feat_cour_stu"> <i class="pe-7s-add-user"></i> {{$detailList->ten_giangvien}}
                                        </span>
                                    </div>
                                    <div class="feat_cour_rating">
                                        <span class="feat_cour_rat">
                                            4.6
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            (3,539)
                                        </span>
                                        <a href="{{route('detailKhoaHoc',$item->id)}}"> <i class="arrow_right"></i> </a>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- End: Course List Content -->

                </div>
            </div>
            <!-- /. col-lg-8 col-md-7 col-sm-12 -->
        </div>
        <!-- /. row -->
    </div>
    <!-- /. container -->
</section>
<!--   End: Teacher Section
==================================================-->


@endsection