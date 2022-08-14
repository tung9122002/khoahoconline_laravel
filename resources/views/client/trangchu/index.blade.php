@extends('client.templates.layout')
@section('content')
     <!-- Start: Hero Section
    
==================================================-->
<div class="slider_owl">
    @foreach ($slider as $it)
    <div class="hero-section hero_two">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="hero_text">
                        <h2> {{$it->tieu_de}}</h2>
                        <p> {{$it->mo_ta}} </p>
                        <a href="{{route('listKhoaHoc')}}" class="more-link"> Khóa Học </a>
                    </div>
                    <!-- /.hero_text -->
                </div>
                <!-- /.col-md-6 col-sm-12-->

                <div class="col-md-6 col-sm-12">
                    <div class="hero_img">
                        {{-- <img src="{{$it->hinh_anh?''.Storage::url($it->hinh_anh):''}}" alt="" class="coding"> --}}
                        <div class="hero_img_ani" id="scene4">
                            <img src="{{$it->hinh_anh?''.Storage::url($it->hinh_anh):'http://placehold.it/100x100'}}" alt="" data-depth="0.10" class="layer">
                        </div>
                        {{-- <div class="hero_stu">
                            <h4> 13k+ Students</h4>
                            <img src="{{asset('client/images/hero_students.png')}}" alt="">
                        </div> --}}
                        <img src="{{asset('client/images/pencil.png')}}" alt="" class="pencil">
                        <!-- /.hero_stu-->
                    </div>
                </div>
                <!-- /.col-md-6 col-sm-12-->
            </div>
            <!-- /. row -->
        </div>
        <!-- /. container -->
        <div class="hero_ellipse_icon">
            <img class="ellipse1" src="{{asset('client/images/ellipse1.png')}}" alt="">
            <img class="ellipse2" src="{{asset('client/images/ellipse11.png')}}" alt="">
            <img class="ellipse3" src="{{asset('client/images/ellipse3.png')}}" alt="">
            <img class="ellipse4" src="{{asset('client/images/ellipse4.png')}}" alt="">
            <img class="ellipse7" src="{{asset('client/images/ellipse7.png')}}" alt="">
            <img class="ellipse8" src="{{asset('client/images/ellipse10.png')}}" alt="">
            <img class="ellipse6" src="{{asset('client/images/ellipse9.png')}}" alt="">
        </div>
        <!-- /.hero_ellipse_icon-->
    </div>
    @endforeach
</div>
<!-- End: Hero Section
==================================================-->  


   <!-- Start: Work Flow Section
==================================================-->
<section class="workflow-section pt-120">
        <!-- Container -->
        <div class="container">
            <!-- Start: Heading -->
            <div class="base-header text-center">
                <h3> Our Work Flow</h3>
            </div>
            <!-- End: Heading -->
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <!-- category 1 -->
                    <div class="workflow_item">
                        <i class="pe-7s-search"></i>
                        <h4> Find Your Course </h4>
                        <p>Lorem ipsum dolor sit amet can be sed diam nonumy eirmod keeps an
                            the satriction of whole life that enter.</p>
                    </div>
                </div>
                <!--/ col-lg-4 col-md-6 col-sm-12  -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <!-- category 1 -->
                    <div class="workflow_item">
                        <i class="pe-7s-date"></i>
                        <h4>Book Your Seat </h4>
                        <p>Lorem ipsum dolor sit amet can be sed diam nonumy eirmod keeps an
                            the satriction of whole life that enter.</p>
                    </div>
                </div>
                <!--/ col-lg-4 col-md-6 col-sm-12  -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <!-- category 1 -->
                    <div class="workflow_item">
                        <i class="pe-7s-medal"></i>
                        <h4> Instant Certified </h4>
                        <p>Lorem ipsum dolor sit amet can be sed diam nonumy eirmod keeps an
                            the satriction of whole life that enter.</p>
                    </div>
                </div>
                <!--/ col-lg-4 col-md-6 col-sm-12  -->
            </div>
            <!--/ row - -->
        </div>
        <!--/ Container - -->
</section>
    <!--   End: Work Flow Section
==================================================-->


  <!-- Start:  About US  Section
==================================================-->
<section class="about-section">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="abt_rating">
                        <h4> 4.9+</h4>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span> User Rating</span>
                    </div>
                    <!-- /.abt_rating-->
                    <div class="about_img" id="scene2">
                        <img src="{{asset('client/images/about.png')}}" alt="image" class="layer" data-depth="0.28">
                    </div>
                    <!-- /.about_img-->
                    <div class="abt_course">
                        <h4>47K+</h4>
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-heart"></i>
                        <i class="fa fa-heart"></i>
                        <span> Active Courses</span>
                    </div>
                    <!-- /.abt_course-->
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="about_text">
                        <h3> We Make Your Learning Through Awesome </h3>
                        <p> Become the dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                            invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam
                            et justo duo dolores et ea rebum. Stet.</p>
                        <a href="contact.html" class="more-link"> Learn More </a>
                    </div>
                </div>
                <!--/ col-md-12  -->
            </div>
            <!--/ row - -->
        </div>
        <!--/ Container - -->
</section>
    <!--   End: About US  Section
==================================================-->

  <!-- Start: Popular Categories Section
==================================================-->
<section class="category-section">
        <!-- Container -->
        <div class="container">
            <!-- Start: Heading -->
            <div class="base-header">
                <h3> Danh mục </h3>
            </div>
            {{-- {{dd($danhmucs)}} --}}
            <!-- End: Heading -->
            <div class="row">
                <div class="col-md-12" id="popula_cat">
                    <!-- category 1 -->
                    @foreach ($listCategory as $item)
                    <div class="category-item">
                        {{-- <img src="{{asset($item->hinh_anh)}}" alt="image"> --}}
                        <h4>{{$item->ten_danhmuc}}</h4>
                    </div>
                    @endforeach
                    {{-- <!-- category 2 -->
                    <div class="category-item">
                        <img src="{{asset('client/images/cat-icon2.png')}}" alt="image">
                        <h4>Education</h4>
                    </div>
                    <!-- category 3 -->
                    <div class="category-item">
                        <img src="{{asset('client/images/cat-icon3.png')}}" alt="image">
                        <h4>Craft</h4>
                    </div>
                    <!-- category 4 -->
                    <div class="category-item">
                        <img src="{{asset('client/images/cat-icon4.png')}}" alt="image">
                        <h4>Marketing</h4>
                    </div>
                    <!-- category 5 -->
                    <div class="category-item">
                        <img src="{{asset('client/images/cat-icon2.png')}}" alt="image">
                        <h4>Design</h4>
                    </div> --}}
                </div>
                <!--/ col-md-12  -->
            </div>
            <!--/ row - -->
        </div>
        <!--/ Container - -->
</section>
    <!--   End: Popular Categories Section
==================================================-->

 <!-- Start: Featured Courses Section
==================================================-->
<section class="feat-course-section">
        <div class="container">
            <!-- Start: Heading -->
            <div class="base-header">
                <h3> Khóa học mới </h3>
            </div>
            <!-- End: Heading -->
            <div class="row">
                @foreach ($list as $item)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="feat_course_item">
                        <img src="{{asset($item->hinh_anh)}}" alt="image">
                        <div class="feat_cour_price">
                            <span class="feat_cour_tag"> {{$item->ten_danhmuc}} </span>
                            <span class="feat_cour_p">{{number_format($item->gia_khoahoc,0,',','.')}} $ </span>
                        </div>
                        <h4 class="feat_cour_tit"> {{$item->ten_khoahoc}} </h4>
                        <div class="feat_cour_lesson">
                            <span class="feat_cour_stu"> <i class="pe-7s-add-user"></i> {{$item->ten_giangvien}} </span>
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
                            <a href="{{route('detailKhoaHoc',[$item->id])}}"> <i class="arrow_right"></i> </a>
                        </div>
                    </div>
                </div>
                @endforeach
            <div class="text-center">
                <a href="{{route('listKhoaHoc')}}" class="more-link"> View All </a>
            </div>
        </div>
        <!-- /. container -->
</section>
    <!-- End: Featured Courses Section
==================================================-->

 <!-- Start:  Learners Feedback Section
==================================================-->
    <section class="lfeedback-section">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="lfeedback_img" id="scene3">
                        <img src="{{asset('client/images/feedback.png')}}" alt="image" class="layer" data-depth="0.28">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12" id="lfeedback_cur">
                    <div class="lfeedback_item">
                        <!-- Start: Heading -->
                        <div class="base-header">
                            <h3> Our Learners Feedback </h3>
                        </div>
                        <!-- Best Book Image 1 -->
                        <div class="lfeedback_text">
                            <p> It's Had been a fear most experience me that I feel a great
                                assumption that never thoughts that will happens to But
                                great provocatives things appropities received without
                                realmost qualifier that happen that never thoughts that will happens to a fear most
                                experience. </p>
                            <h4> David Benjamin </h4>
                            <h5>Washington, United States</h5>
                        </div>
                    </div>
                    <div class="lfeedback_item">
                        <!-- Start: Heading -->
                        <div class="base-header">
                            <h3> Our Learners Feedback </h3>
                        </div>
                        <!-- Best Book Image 1 -->
                        <div class="lfeedback_text">
                            <p> It's Had been a fear most experience me that I feel a great
                                assumption that never thoughts that will happens to But
                                great provocatives things appropities received without
                                realmost qualifier that happen that never thoughts that will happens to a fear most
                                experience. </p>
                            <h4> David Benjamin </h4>
                            <h5>Washington, United States</h5>
                        </div>
                    </div>
                </div>
                <!--/ col-md-12  -->
            </div>
            <!--/ row - -->
        </div>
        <!--/ Container - -->
    </section>
    <!--   End: Learners Feedback Section
==================================================-->


 <!-- Start: Newsletter Section  
==================================================-->
    <section class="newsletter-section pb-130">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="newsletter_wrap">
                        <!-- Start: Heading -->
                        <div class="base-header">
                            <h3> Sign Up To Our Newsletter </h3>
                        </div>
                        <span>
                            Subscribe to our newsletter and get many <br />
                            interesting things every week
                        </span>
                        <div class="newsletter_form">
                            <input class="newsletter_field" name="search" id="search_field" type="text"
                                placeholder="Type your email address" />
                            <a href="#"> SUBSCRIBE </a>
                        </div>
                        <!-- Best Book Image 1 -->
                    </div>
                </div>
            </div>
            <!-- /. row -->
        </div>
        <!-- /. container -->
    </section>
    <!-- End: Newsletter Section
==================================================-->
@endsection

