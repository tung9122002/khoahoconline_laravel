
<div class="navigation navigation_two">
    <div class="container">
        <div class="logo">
            <a href="{{route('trangchu')}}"><img class="img-responsive" src="{{asset('client/images/logo.png')}}" alt="">
            </a>
        </div>
        <div id="navigation" class="menu-wrap">
            <ul>
                <li><a href="{{route('trangchu')}}">Trang Chủ</a></li>
                <li><a href="{{route('teacher')}}">Giáo Viên</a></li>
                <li class="has-sub"><a href="{{route('listKhoaHoc')}}"> Khóa Học</a>
                    <ul>
                        <li><a href="{{route('list_category_KhoaHoc')}}">Danh Mục Khóa Học</a> </li>
                        <li><a href="{{route('listKhoaHoc')}}">Tất Cả Khóa Học</a> </li>
                    </ul>
                </li>

                <!-- <li class="has-sub"><a href="blog.html">Blog</a>
                    <ul>
                        <li><a href="blog.html">Blog One</a> </li>
                        <li><a href="single-blog.html">Blog Details</a> </li>
                        <li><a href="events.html">Event Page</a> </li>
                        <li><a href="single-event.html">Event Details</a> </li>
                    </ul>
                </li> -->
                <li><a href="{{route('contact')}}">Liên Hệ</a></li>
            </ul>
        </div>
        <!-- End: navigation  -->
        <div class="header_sign">
           
            @if (Auth::user())
            <nav id="navigation">
                <ul>
                  <li><a href="#" style="color: red" aria-haspopup="true"> {{$objUser->name}}</a>
                    <ul class="dropdown" aria-label="submenu">
                      <li><a href="#">{{$objUser->email}}</a></li>
                      <li> <a href="{{route('logout')}}" class="dropdown-item">Sign out</a></li>
                      <li> <a href="{{route('lichsuDangKy',[$objUser->id])}}" class="dropdown-item">Lịch sử đăng ký </a></li>
                      <li>
                        @if (Auth::user()->id_role!=2)
                        <a href="{{route('admin.user.index')}}" class="dropdown-item">Admin</a>
                        @endif
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
              @else
              <a href="{{route('login')}}" class="more-link"> Sign in  </a>     
              @endif
        </div>
        <!-- End: Sign in -->
    </div>
    <!--/ container -->
</div>