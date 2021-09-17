@php
    $have =false;
    $course = null;
    $course= \App\Models\Course::where('slug','=',$slug)->first();
    if(isset($course)){
        $title=$course->name;
        $have =true;
        $tag = $course->tags()->first();
        $courseList =$tag->courses()->get();

    }

@endphp
@extends('layout.app')
@section('content')
    @if(!$have)
        <h1 class="text-center text-success p-5">Không tồn tại khóa học</h1>
    @else
        <style>
            .bg-thumbnail {
                background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{$course->thumbnail}}');
                background-size: cover;
                background-position: center;
            }
        </style>
        <!-- Modal -->
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{$course->name}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p class="text-muted">Để lại SĐT và Email, chúng tôi sẽ tư vấn sớm nhất cho bạn .</p>
                        <form action="{{route('save.customer')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="text-origin font-weight-bold" for="exampleInputEmail1">Họ và tên</label>
                                <input type="text" name="fullname" class="form-control" id="exampleInputEmail1" required>
                            </div>
                            <div class="form-group">
                                <label class="text-origin font-weight-bold" for="exampleInputEmail1">Email</label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                       aria-describedby="emailHelp" required>
                                <small id="emailHelp" class="form-text text-muted">Chúng tôi không bao giờ chia sẻ email của
                                    bạn</small>
                            </div>
                            <div class="form-group">
                                <label class="text-origin font-weight-bold" for="exampleInputPassword1">Số điện thoại</label>
                                <input type="text" class="form-control" id="exampleInputPassword1" name="phone" required>
                            </div>

                                <input name="message" type="hidden" value="Tôi muốn tư vấn : {{$course->name}}">


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-origin show">Gửi đi</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous"
                src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0"
                nonce="octYZSHa">
        </script>
        <div class="bg-thumbnail py-5 text-white">
            <div class="container p-5">
                <div class="h1">{{$course->name}}</div>
                <button type="button" class="btn btn-origin" data-toggle="modal" data-target="#exampleModal">
                    Tư vấn về khóa học này ?
                </button>
{{--                <a class="link-style-none btn booking btn-outline-primary text-white" href="{{route('booking',['key'=>base64_encode($course->slug)])}}"></a>--}}
            </div>
        </div>
        <div class="container py-5">
            <div class="h2 p5 w-100 content">Giới thiệu khóa học</div>
            <div>
                {!! $course -> description !!}
            </div>
            <hr>
            <div class="h2 p5 w-100 content-wrapper">Phương pháp học</div>
            <div>
                {!! $course -> learning !!}
            </div>
            <hr>
            <div class="h2 p5 w-100">Nội dung khóa học</div>
            <div id="preview">
                {!! $course -> content !!}
            </div>
        </div>
        <div class="container">
            <a type="button" class="btn btn-origin w-100" data-toggle="modal" data-target="#exampleModal">
                Tư vấn về khóa học này ?
            </a>
        </div>
        @if(isset($courseList))
            <div class="text-center text-origin h2 py-5">Các khóa học liên quan</div>
            <div class="container py-5">
                <div class="row">
                    @foreach($courseList  as $relateCourse)
                        @if($relateCourse->name != $course->name)
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="card">
                                    <a href="{{route('course',['slug'=>$relateCourse->slug])}}"
                                       class="link-style-none">
                                        <div class="bg-white">
                                            <div class="crop-img">
                                                <img src="{{$relateCourse->thumbnail}}" class="w-100">
                                            </div>
                                            <div class="p-1 card-header">
                                                {{$relateCourse->name}}
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endif
        <div class="container">
            <div class="fb-comments w-100" data-mobile="true" data-href="http://bizenglish.vn/course/{{$slug}}"
                 data-width="" data-numposts="5"></div>
        </div>
        <div class="list">
            @endif
            <style>
                #preview a,.booking {
                    color: #0B90C4;
                    cursor: pointer;
                }

                .crop-img {
                    height: 150px;
                    overflow: hidden;
                }

                @media screen and (max-width: 576px) {
                    table, img {
                        width: 100% !important;
                        height: auto !important;
                    }
                }
            </style>
           @endsection
