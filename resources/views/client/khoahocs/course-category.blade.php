@extends('client.templates.layout')
@section('content')
     <!-- header -->
     <header class="single-header">
        <!-- Start: Header Content -->
        <div class="container">
            <div class="row text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-sm-12">
                    <!-- Headline Goes Here -->
                    <h3>Category Courses</h3>
                    <h4><a href="index-2.html"> Home </a> <span> &vert; </span> Category </h4>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </header>
    <!--/. header -->
    <!--/    
==================================================-->




    <!-- Start: Featured Courses Section
==================================================-->
    <section class="course_cat_section">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3 course_sidebar">
                    <div class="course_cat_sidebar">
                        <h4 class="course_cat_title">Danh Mục</h4>
                        @foreach ($listCategory as $item)
                        <ul>
                           <li>
                            <div class="course_cat_check">
                                {{-- <input class="cat-check-input" type="checkbox" value="" id="catCheck1"> --}}
                                <label class="cat-check-label" for="catCheck1">
                                   <a href="{{url('course-category?id_danhmuc='.$item->id)}}"> {{$item->ten_danhmuc}}</a>
                                </label>
                            </div>
                        </li>
                        </ul>
                        @endforeach
                    </div>
                    <!-- end: Category Widget-->

                    {{-- <div class="course_price_sidebar">
                        <h4 class="course_cat_title">Price Level</h4>
                        <ul>
                            <li>
                                <div class="course_cat_check">
                                    <input class="cat-check-input" type="radio" value="" id="priceCheck1" checked=""
                                        name="priceCheck">
                                    <label class="cat-check-label" for="priceCheck1">
                                        Free
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="course_cat_check">
                                    <input class="cat-check-input" type="radio" value="" id="priceCheck2" checked=""
                                        name="priceCheck">
                                    <label class="cat-check-label" for="priceCheck2">
                                        Paid
                                    </label>
                                </div>
                            </li>

                        </ul>
                    </div> --}}
                    <!-- end: Price Level Widget-->
                    <div class="course_instructor_sidebar">
                        <h4 class="course_cat_title">Giảng Viên </h4>
                        <ul>
                          @foreach ($listGiangVien as $item)
                          <li>
                            <div class="course_instructor_check">
                                {{-- <input class="instructor-check-input" type="checkbox" value="" id="instructorCheck1"
                                    name="instructor"> --}}
                                <label class="instructor-check-label" for="instructorCheck1">
                                   <a href="{{url('course-category?id_giangvien='.$item->id)}}"> {{$item->ten_giangvien}}</a>
                                </label>
                            </div>
                        </li>
                          @endforeach
                        </ul>
                        
                    </div>
                    <!-- end: Instructor Widget-->

                    {{-- <div class="course_lang_sidebar">
                        <h4 class="course_cat_title">Language </h4>
                        <ul>
                            <li>
                                <div class="course_language_check">
                                    <input class="language-check-input" type="checkbox" value="" id="languageCheck1"
                                        name="language">
                                    <label class="language-check-label" for="languageCheck1">
                                        English
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="course_instructor_check">
                                    <input class="language-check-input" type="checkbox" value="" id="languageCheck2"
                                        name="language">
                                    <label class="language-check-label" for="languageCheck2">
                                        Spanish
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="course_instructor_check">
                                    <input class="language-check-input" type="checkbox" value="" id="languageCheck3"
                                        name="language">
                                    <label class="language-check-label" for="languageCheck3">
                                        Bengali
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="course_instructor_check">
                                    <input class="language-check-input" type="checkbox" value="" id="languageCheck4"
                                        name="language">
                                    <label class="language-check-label" for="languageCheck4">
                                        Portuguese
                                    </label>
                                </div>
                            </li>
                            <li>
                                <div class="course_instructor_check">
                                    <input class="language-check-input" type="checkbox" value="" id="languageCheck5"
                                        name="language">
                                    <label class="language-check-label" for="languageCheck5">
                                        Russian
                                    </label>
                                </div>
                            </li>

                        </ul>
                    </div> --}}
                    <!-- end: Language Widget-->
                </div>
                <!-- end: col-sm-12 col-lg-3-->

                <!--  Start: col-sm-12 col-lg-9 -->
                <div class="col-sm-12 col-lg-9">
                    <div class="row">
                        <div class="col-sm-12 cat_search_filter">
                            <div class="cat_search">
                                <div class="widget widget-search">
                                    <!-- input-group -->
                              <form action="" method="get">
                                <div class="input-group">
                                    <input class="form-control" name="search" placeholder="Search" type="text">
                                    <span class="input-group-btn">
                                        <button type="submit"><i class="pe-7s-search"></i></button>
                                    </span>
                                </div>
                              </form>
                                    <!-- /input-group -->
                                </div>
                            </div>
                            <!-- End: Search -->
                            <div class="cat_selectbox">
                                <div class="select-box">
                                 <select class="form-select" aria-label="select">
                                    @foreach ($listCategory as $cate)
                                    <option value=""><a href="">{{$cate->ten_danhmuc}}</a></option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            <!-- end: select box -->
                            <div class="cat_item_count">
                                Tổng số khóa học trong 1 trang: {{count($list)}}
                            </div>
                        </div>
                        <!--  End: Search Filter -->

                       @foreach ($list as $item)
                       <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="feat_course_item">
                            <img src="{{asset($item->hinh_anh)}}" alt="image">
                            <div class="feat_cour_price">
                                <span class="feat_cour_tag"> {{$item->ten_danhmuc}} </span>
                                <span class="feat_cour_p">{{number_format($item->gia_khoahoc,0,',','.')}} $</span>
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
                    </div>

                    <div class="base-header">
                        {{-- phân trang theo danh sách lọc dữ liệu --}}
                        {{-- {{$list->appends($extParams)->links()}} --}}
                        {{$list->links()}}
                </div>
                    <!-- end:  pagination-->
                </div>
            </div>
            <!-- /. row -->
        </div>
        <!-- /. container -->
    </section>
    <!-- End: Featured Courses Section
==================================================-->

@endsection
