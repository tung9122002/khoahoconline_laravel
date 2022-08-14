@extends('client.templates.layout')
@section('content')
    <!-- header -->
    <header class="single-header">
        <!-- Start: Header Content -->
        <div class="container">
            <div class="row text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-sm-12">
                    <!-- Headline Goes Here -->
                    <h3>Teachers</h3>
                    <h4><a href="index-2.html"> Home </a> <span> &vert; </span> Teachers </h4>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </header>

        <!-- Start: Teacher Section
==================================================-->
<section class="teacher-section">
    <div class="container">
        <div class="row">
            @foreach ($listGiangVien as $item)
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- teacher-list -->
                <div class="teacher-img">
                    <img src="{{asset($item->hinh_anh)}}" alt="image">
                </div>
                <div class="teacher-info">
                    <div class="teacher-social">
                        <ul>
                            <li>
                                <a href="#" class="fab fa-facebook-f"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-twitter"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-linkedin-in"></a>
                            </li>
                            <li>
                                <a href="#" class="fab fa-skype"></a>
                            </li>
                        </ul>
                    </div>
                    <a href="{{route('detailTeacher',[$item->id])}}">
                        <h4>{{$item->ten_giangvien}} </h4>
                    </a>
                </div>
                <!-- End: .teacher-list -->
            </div>
            @endforeach
        </div>
        <div class="row teacher_partner">
            <div class="partner_col">
                <span> Exceptional opportunities</span>
                <h2> Become a Instractor</h2>
                <a href="contact.html" class="more-link"> Contact Us </a>
            </div>
            <div class="partner_col">
                <span> Exceptional opportunities</span>
                <h2> Join our community</h2>
                <a href="contact.html" class="more-link"> Contact Us </a>
            </div>
        </div>
        <!-- /. row -->
    </div>
    <!-- /. container -->
</section>
<!--   End: Teacher Section
==================================================-->

@endsection
