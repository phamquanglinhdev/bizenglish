<!-- This file is used to store sidebar items, starting with Backpack\Base 0.9.0 -->
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i>Bảng
        điều khiển</a></li>


<li class='nav-item'><a class='nav-link' href='{{ backpack_url('prolife')}}'><i class='nav-icon la la-user'></i> Hồ
        sơ</a></li>
@if(backpack_user()->role == 0)
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('post') }}'><i class='nav-icon la la-pinterest'></i> Bài
            viết</a></li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('tags') }}'><i class='nav-icon la la-tags'></i> Nhãn</a>
    </li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('course') }}'><i class='nav-icon la la-book'></i>Khóa
            học</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ backpack_url('elfinder') }}"><i
                class="nav-icon la la-files-o"></i> <span>Quản lý upload</span></a></li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('customer') }}'><i
                class='nav-icon la la-people-carry'></i> Khách hàng</a></li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('cofig') }}'><i class='nav-icon la la-radiation'></i>Cài
            đặt</a></li>
    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('user') }}'><i
                class='nav-icon la la-user-alt-slash'></i> Người dùng</a></li>

    <li class='nav-item'><a class='nav-link' href='{{ backpack_url('option') }}'><i class='nav-icon la la-umbrella'></i> Tag cho giáo viên</a></li>
@endif

<li class='nav-item'><a class='nav-link' href='{{ backpack_url('page') }}'><i class='nav-icon la la-pager'></i>Các trang tĩnh</a></li>
<li class='nav-item'><a class='nav-link' href='{{ backpack_url('comment') }}'>
        <i class='nav-icon la la-star'></i>{{backpack_user()->role==0 ?'Đánh giá BizEnglish':'Đánh giá giáo viên '.backpack_user()->name}}</a></li>
<li class='nav-item'><a class='nav-link' href='{{route("app.index")}}'><i class='nav-icon  la la-braille'></i>Ứng dụng</a></li>
