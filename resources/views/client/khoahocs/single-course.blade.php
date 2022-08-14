@extends('client.templates.layout')
@section('content')
     <!-- header -->
     <header class="single-header">
        <!-- Start: Header Content -->
        <div class="container">
            <div class="row text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-sm-12">
                    <!-- Headline Goes Here -->
                    <h3>Single Course</h3>
                    <h4><a href="index-2.html"> Home </a> <span> &vert; </span> Courses </h4>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
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
    </header>
    <!--/. header -->
    <!--/    
==================================================-->
    <!-- Start : Blog Page Content  
==================================================-->

    {{-- {{dd($list)}} --}}
    <div class="single_course">
        <div class="container">
            <div class="row">
                <!-- Blog Area -->
                <div class="col-lg-8 col-sm-12">
                    <div class="sing_course_wrap">
                        <div class="sin_course_img">
                            <img class="img-responsive" src="{{$list->hinh_anh}}" width="700px" alt="">
                            <span>{{$list->ten_danhmuc}}</span>
                        </div>
                        <h4>{{$list->ten_khoahoc}}</h4>
                        {{-- <img src="{{$list->hinh}}" alt="" width="100px"> --}}
                        <div class="course_meta">
                            {{-- <p>{{$query->ten_giangvien}}</p> --}}
                            <span class="sin_cour_stu"> <i class="fal fa-graduation-cap"></i> {{$list->ten_khoahoc}} </span>
                            <span class="sin_cour_rat">
                                4.7
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                (4,5609)
                            </span>
                        </div>

                        <div class="course_tab">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <button class="nav-link active" id="pills-discription-tab" data-bs-toggle="tab"
                                        data-bs-target="#pills-discription" role="tab" aria-controls="pills-discription"
                                        aria-selected="true" type="button">Mô tả</button>
                                </li>
                                {{-- <li class="nav-item">
                                    <button class="nav-link" id="pills-curriculum-tab" data-bs-toggle="tab"
                                        data-bs-target="#pills-curriculum" role="tab" aria-controls="pills-curriculum"
                                        aria-selected="false" type="button">Curriculum</button>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <button class="nav-link" id="pills-instructors-tab" data-bs-toggle="tab"
                                        data-bs-target="#pills-instructors" role="tab" aria-controls="pills-instructors"
                                        aria-selected="false" type="button">Giảng viên</button>
                                </li> --}}
                                {{-- <li class="nav-item">
                                    <button class="nav-link" id="pills-reviews-tab" data-bs-toggle="tab"
                                        data-bs-target="#pills-reviews" role="tab" aria-controls="pills-reviews"
                                        aria-selected="false" type="button">Reviews</button>
                                </li> --}}
                            </ul>
                            <div class="tab-content course_tab_cont" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-discription"
                                    aria-labelledby="pills-discription-tab" role="tabpanel">
                                    <span> Mô tả : </span>
                                    <p>
                                        {{$list->mo_ta}}
                                    </p>
                                    {{-- <span> What You Will Learn : </span>
                                    <p>
                                        E learning dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                        vero eos keti accusam et justo duo dolores et ea rebum. Stet clita kasd
                                        gubergren, no sea takimel.
                                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                                        done sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                        dolore facts.
                                    </p>
                                    <span> Certification : </span>
                                    <p>
                                        E learning dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                        vero eos keti accusam et justo duo dolores et ea rebum. Stet clita kasd
                                        gubergren, no sea takimel.
                                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                                        done sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                        dolore facts.
                                    </p> --}}
                                    <div class="share_course">
                                        <span> Chia sẻ khóa học : </span>
                                        <a href="#" class="fab fa-facebook-f"></a>
                                        <a href="#" class="fab fa-pinterest"></a>
                                        <a href="#" class="fab fa-twitter"></a>
                                        <a href="#" class="fa fa-link"></a>
                                    </div>
                                </div>
                                <!-- End:: discription-tab  -->
                                {{-- <div class="tab-pane fade" id="pills-curriculum" aria-labelledby="pills-curriculum-tab"
                                    role="tabpanel">
                                    <span> Curriculum : </span>
                                    <p>
                                        E learning dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                        vero eos keti accusam et justo duo dolores et ea rebum. Stet clita kasd
                                        gubergren, no sea takimel.
                                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                                        done sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                        dolore magna valiquyam erat, sed diam voluptua. At vero eos et accusam et justo
                                        duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est
                                        Lorem ipsum dolor sit.
                                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.
                                        E learning dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                        vero eos keti accusam et justo duo dolores et ea rebum. Stet clita kasd
                                        gubergren, no sea takimel.
                                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                                        done sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                        dolore facts.
                                        E learning dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At
                                        vero eos keti accusam et justo duo dolores et ea rebum. Stet clita kasd
                                        gubergren, no sea takimel.
                                        sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
                                        done sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et
                                        dolore facts.
                                    </p>
                                    <div class="share_course">
                                        <span> Share Course : </span>
                                        <a href="#" class="fab fa-facebook"></a>
                                        <a href="#" class="fab fa-pinterest"></a>
                                        <a href="#" class="fab fa-twitter"></a>
                                        <a href="#" class="fa fa-link"></a>
                                    </div>
                                </div> --}}
                                {{-- <div class="tab-pane fade" id="pills-instructors"
                                    aria-labelledby="pills-instructors-tab" role="tabpanel">
                                    <span> Giảng viên : </span>
                                    <div class="course_instractor">
                                       <div class="course_instor_list">
                                        <img src="{{$item->hinh}}" alt="">
                                        <h4> {{$item->ten_giangvien}} </h4>
                                        <span> {{$item->ten_danhmuc}}</span>
                                        <div class="course_instor_soc">
                                            <a href="#" class="fab fa-facebook-i"></a>
                                            <a href="#" class="fab fa-pinterest"></a>
                                            <a href="#" class="fab fa-twitter"></a>
                                            <a href="#" class="fa fa-link"></a>
                                        </div>
                                    </div>
                                    </div>
                                </div> --}}
                                {{-- <div class="tab-pane fade" id="pills-reviews" aria-labelledby="pills-reviews-tab"
                                    role="tabpanel">
                                    <span> Students Reviews :</span>

                                    <div id="revCarousel" class="carousel slide sturev_carousel"
                                        data-bs-ride="carousel">

                                        <div class="carousel-item sturev_item active">
                                            <!-- Start: Heading -->
                                            <div class="sturev_wrap">
                                                <img src="images/instructor4.png" alt="">
                                                <div class="sturev_name">
                                                    <h4>Beckham Davis</h4>
                                                    <span> UI Designer</span>
                                                </div>
                                                <span class="sturev_rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                nonumy
                                                eirmod at tempor invidunt ut labore et dolore magna aliquyam erat,
                                                sed
                                                diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                                rebum.
                                                Stet clita kasd gubergren veccens.</p>
                                        </div>
                                        <div class="carousel-item sturev_item">
                                            <!-- Start: Heading -->
                                            <div class="sturev_wrap">
                                                <img src="images/instructor4.png" alt="">
                                                <div class="sturev_name">
                                                    <h4>Beckham Davis</h4>
                                                    <span> UI Designer</span>
                                                </div>
                                                <span class="sturev_rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </span>
                                            </div>
                                            <p> Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam
                                                nonumy
                                                eirmod at tempor invidunt ut labore et dolore magna aliquyam erat,
                                                sed
                                                diam voluptua. At vero eos et accusam et justo duo dolores et ea
                                                rebum.
                                                Stet clita kasd gubergren veccens.</p>
                                        </div>
                                        <div class="carousel-indicators">
                                            <button type="button" data-bs-target="#revCarousel" data-bs-slide-to="0"
                                                class="active" aria-current="true" aria-label="Slide 1"></button>
                                            <button type="button" data-bs-target="#revCarousel" data-bs-slide-to="1"
                                                aria-label="Slide 2"></button>
                                            <button type="button" data-bs-target="#revCarousel" data-bs-slide-to="2"
                                                aria-label="Slide 3"></button>
                                        </div>
                                    </div>
                                    <!--/ col-md-12  -->
                                    <div class="review_form">
                                        <span> Write A Review</span>
                                        <form method="post" action="https://santhemes.com/tidytheme/aducat/mailer.php" id="contact-form">
                                            <div class="row">
                                                <div class="col-lg-6 col-sm-12">
                                                    <input class="con-field" name="name" id="rname" type="text"
                                                        placeholder="Name">
                                                </div>
                                                <div class="col-lg-6 col-sm-12">
                                                    <input class="con-field" name="email" id="remail" type="text"
                                                        placeholder="Email">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 col-sm-12 rev_textarea">
                                                    <textarea class="con-field" name="message" id="rmessage" rows="6"
                                                        placeholder="Your Comment"></textarea>
                                                    <span class="sin_cour_rat">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                                <div class="col-lg-12 col-sm-12 submit-area">
                                                    <input type="submit" class="submit-contact" value="Submit">
                                                    <div id="msg" class="message"></div>
                                                </div>
                                            </div>


                                        </form>
                                    </div>
                                </div> --}}
                            </div>
                        </div>

                    </div>
                    <!--/ article -->
                </div>
                <!--/ Left Side Area -->

                <!-- Widget Area -->
                <div class="col-lg-4 col-sm-12 single_curs_right">
                    <!-- Widget Course Details -->
                    {{-- {{dd(Session::get('khuyenmai'))}} --}}
                    <aside class="widget-course-details">
                        <h2> Giá <span> {{number_format($list->gia_khoahoc,0,',','.')}} $ </span></h2>
                        <div class="course-detail-list">
                            {{-- <span> <i class="far fa-user"></i>Giảng viên </span> --}}
                            {{-- <span> {{$list->ten_giangvien}} </span> --}}
                        </div>
                        {{-- <div class="course-detail-list">
                            <span> <i class="far fa-clock"></i>Duration </span>
                            <span> 07 hr 20 mins </span>
                        </div> --}}
                        {{-- <div class="course-detail-list">
                            <span> <i class="far fa-journal-whills"></i>Lớp </span>
                            <span> {{$list->ten_lop}} </span>
                        </div> --}}
                        {{-- <div class="course-detail-list">
                            <span> <i class="far fa-layer-group"></i>Số lượng sinh viên </span>
                            <span> {{$list->so_luong_sv}} </span>
                        </div> --}}
                        <div class="course-detail-list">
                            <span> <i class="far fa-globe"></i>Ngôn ngữ </span>
                            <span> Tiếng Việt </span>
                        </div>
                        <div class="course-detail-list">
                            <span> <i class="far fa-book-spells"></i>Chứng nhận </span>
                            <span> Có </span>
                        </div> <br>
                        <center> <label for="" style="color: red">Bạn có mã giảm giá ?</label></center>
                        <div class="course-detail-list">
                            <form action="{{url('/check-khuyenmai')}}" method="POST">
                                @csrf
                                <span><input class="form-control" name="ma_khuyenmai" id="ma_khuyenmai" type="text"
                                    placeholder="Nhập mã giảm giá"> <br>
                                    <span>  <button class="" style="height: 33px; border-style:none; border-radius:5px;background: red;color: white" type="submit">Áp dụng</button>    </span>
                             </form>
                        </div>
                    </aside>
                    <!-- Widget Course Details /- -->

                    <!-- Related Courses -->
                    <aside class="widget-rel-course">
                        <h3>Đăng ký lớp </h3>
                        <table class="table">
                            <thead class="thead-light">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Lớp</th>
                                <th scope="col">GV</th>
                                <th scope="col">SL</th>
                                <th scope="col">Đăng Ký</th>
                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($query as $it)
                             <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$it->ten_lop}}</td>
                                <td>{{$it->ten_giangvien}}</td>
                                <td><center>{{$it->so_luong_sv}}</center></td>
                                <td><a href="{{route('dangkyCourse',['id'=> $it->id])}}" class="more-link">Đăng Ký</a></td>
                              </tr>
                             @endforeach
                            </tbody>
                          </table>
                        {{-- <div class="rel-course-box">
                            <a href="single-blog.html">Components are clearly alined with those
                                particular assignment</a>
                            <span> Development </span>
                        </div>
                        <div class="rel-course-box">
                            <a href="single-blog.html">Components are clearly alined with those
                                particular assignment</a>
                            <span> Development </span>
                        </div>
                        <div class="rel-course-box">
                            <a href="single-blog.html">Components are clearly alined with those
                                particular assignment</a>
                            <span> Development </span>
                        </div> --}}
                    </aside>
                    <br>
                    {{-- <aside class="widget-rel-course">
                        <h3>Khóa học liên quan</h3>
                        <div class="rel-course-box">
                            <a href="single-blog.html">Components are clearly alined with those
                                particular assignment</a>
                            <span> Development </span>
                        </div>
                        <div class="rel-course-box">
                            <a href="single-blog.html">Components are clearly alined with those
                                particular assignment</a>
                            <span> Development </span>
                        </div>
                        <div class="rel-course-box">
                            <a href="single-blog.html">Components are clearly alined with those
                                particular assignment</a>
                            <span> Development </span>
                        </div>
                    </aside> --}}
                    <!-- Related Courses /- -->
                </div>
                <!-- Widget Area /- -->
            </div>
        </div>
        <!-- Container /- -->
    </div>
    <!-- End : Blog Page Content 
==================================================-->

@endsection