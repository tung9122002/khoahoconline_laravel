@extends('client.templates.layout')
@section('content')
    <!-- header -->
    <header class="single-header">
        <!-- Start: Header Content -->
        <div class="container">
            <div class="row text-center wow fadeInUp" data-wow-delay="0.5s">
                <div class="col-sm-12">
                    <!-- Headline Goes Here -->
                    <h3>Login Form</h3>
                    <h4><a href="index-2.html"> Home </a> <span> &vert; </span> Login </h4>
                </div>
            </div>
            <!-- End: .row -->
        </div>
        <!-- End: Header Content -->
    </header>
    <!--/. header -->
    <!-- Start: Account Section 
==================================================-->
<section class="account-section">
    {{-- @if(Auth::user())
        <script>window.location.href='/';</script>
    @endif --}}
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="reg_wrap">
                    <!-- Start: Image -->
                    <div class="reg_img">
                        <img src="{{asset('client/images/hero-men.png')}}" alt="">
                    </div>
                    <!-- Start:  Login Form  -->
                    <div class="login-form">
                        <h2> Login to Your Account </h2>
                        <form action="{{ url('/login') }}" method="post" >
                            <input class="login-field" name="email" id="lemail" type="text"
                                placeholder="Enter Your Email">
                            <input class="login-field" name="password" id="lpassword" type="password"
                                placeholder="Enter Your Password">
                            <div class="lost_pass">
                                <input type="checkbox" id="rem-checkbox-input">
                                <label for="rem-checkbox-input" class="rem-checkbox">
                                    <span class="rem-me">Remember me</span>
                                </label>
                                <a href="#" class="forget"> Lost your password? </a>
                            </div>
                            <div class="submit-area">
                                <button type="submit" class="submit more-link">Đăng Nhập</button>
                                <a href="{{route('register')}}" class="submit more-link"> Đăng Ký Tài Khoản</a>
                                <div id="lmsg" class="message"></div>
                            </div>
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        </form>
                    </div>
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
            
                    <?php //lỗi hệ thống ?>
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
                    <!-- End:Login Form  -->
                </div>
            </div>
            <!-- .col-md-6 .col-sm-12 /- -->
        </div>
        <!-- row /- -->
    </div>
    <!-- container /- -->
</section>
<!-- End : Account Section 
==================================================-->
@endsection