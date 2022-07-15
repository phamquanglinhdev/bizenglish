@extends('layout.app')
@section('content')
    <link rel="stylesheet" href="{{asset('asset/nicelabel/css/jquery-nicelabel.css')}}">
    <script src="{{asset('asset/nicelabel/js/jquery.nicelabel.js')}}"></script>
    <div class="top-bar">
        <div class="text-center text-white h4 pt-5 ">GIÁO VIÊN CỦA CHÚNG TÔI</div>
        <div class="container shadow mb-5 pb-2 bg-white">
            <div>
                <form action="{{route('filter')}}" method="post">
                    @csrf
                    <div class="row p-3">
                        @php
                            $filters = \App\Models\Option::get();
                        @endphp
                        @for($i=0;$i<3;$i++)
                            <div class="col-md-4 col-sm-12 col-12 ">
                                @if($i==0)
                                    <button class="btn btn-origin my-2 w-100 px-0" type="button" data-toggle="collapse"
                                            data-target="#toggle-{{$i}}" aria-expanded="false"
                                            aria-controls="toggle-{{$i}}">
                                        Bạn muốn học gì?
                                    </button>
                                @endif
{{--                                @if($i==1)--}}
{{--                                    <button class="btn btn-origin my-2 w-100 px-0" type="button" data-toggle="collapse"--}}
{{--                                            data-target="#toggle-{{$i}}" aria-expanded="false"--}}
{{--                                            aria-controls="toggle-{{$i}}">--}}
{{--                                        Mức phí--}}
{{--                                    </button>--}}
{{--                                @endif--}}
                                @if($i==2)
                                    <button class="btn btn-origin my-2 w-100 px-0" type="button" data-toggle="collapse"
                                            data-target="#toggle-{{$i}}" aria-expanded="false"
                                            aria-controls="toggle-{{$i}}">
                                        Giáo viên nước
                                    </button>
                                @endif
                                <div class="">
                                    <div class="collapse" id="toggle-{{$i}}">
                                        @foreach($filters as $option)
                                            @if($option->type==$i)
                                                <div>
                                                    <input class="text-nicelabel"
                                                           type="checkbox"
                                                           data-nicelabel='{"checked_text": "{{$option->name}}", "unchecked_text": "{{$option->name}}"}'
                                                           value="{{$option->id}}" name="data-teach-{{$option->id}}">
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endfor
{{--                        <div class="col-md-3 col-sm-6 col-12 ">--}}
{{--                            <button class="btn btn-origin my-2 w-100 px-0" type="button" data-toggle="collapse"--}}
{{--                                    data-target="#collapseExample" aria-expanded="false"--}}
{{--                                    aria-controls="collapseExample">--}}
{{--                                Thời gian có thể học--}}
{{--                            </button>--}}
{{--                            <div class="collapse" id="collapseExample">--}}
{{--                                <div class="py-2">Giờ trong ngày</div>--}}
{{--                                <div class="row m-0">--}}
{{--                                    @foreach($filters as $option)--}}
{{--                                        @if($option->type==3)--}}
{{--                                            <div class="col-md-4 m-0 p-0 rounded-0">--}}
{{--                                                <input class="text-nicelabel"--}}
{{--                                                       type="checkbox"--}}
{{--                                                       data-nicelabel='{"checked_text": "{{$option->name}}", "unchecked_text": "{{$option->name}}"}'--}}
{{--                                                       value="{{$option->id}}" name="data-teach-{{$option->id}}">--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </div>--}}
{{--                                <div class="py-2">Ngày trong tuần</div>--}}
{{--                                <div class="row m-0">--}}
{{--                                    @for($w=2;$w<=7;$w++)--}}
{{--                                        <div class=" col-md-4 m-0 p-0">--}}
{{--                                            <input class="text-nicelabel" name="999{{$w}}" value="999{{$w}}"--}}
{{--                                                   data-nicelabel='{"checked_text": "Thứ {{$w}}", "unchecked_text": "Thứ {{$w}}"}'--}}
{{--                                                   type="checkbox">--}}
{{--                                        </div>--}}
{{--                                    @endfor--}}
{{--                                    <div class=" col-12 m-0 p-0">--}}
{{--                                        <input class="text-nicelabel" name="9998" value="999{{$w}}"--}}
{{--                                               data-nicelabel='{"checked_text": "Chủ nhật", "unchecked_text": "Chủ nhật"}'--}}
{{--                                               type="checkbox">--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-origin">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom: 100px">
        @foreach($data as $key => $teacher)
            <div class="border p-3 shadow my-2">
                <div class="row">
                    <div class="col-md-3 col-sm-6-col-12">
                        <img class="img-fluid" alt="noe"
                             src="{{ $data[$key]['avatar'] != null ? $data[$key]['avatar'] : 'https://cloudcone.com/wp-content/uploads/2019/03/blank-avatar.jpg'}}">
{{--                        <div class="my-2 rounded text-white py-2 text-center bg-origin">{{($data[$key]['price'])/1000}}.000 đ /--}}
{{--                            Giờ Học--}}
{{--                        </div>--}}
                    </div>
                    <div class="text-dark p-2 col-md-9 col-sm-6 col-12">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <b class="h4">{{$data[$key]['name']}}</b>
                                <span class="text-white float-right">
                                    <button class="btn btn-origin text-white"><a
                                            href="{{route('teacher',$data[$key]['id'])}}"
                                            class="link-style-none text-white">Xem chi tiết</a></button>
                                </span>
                                <div class="w-100 pt-4 clearfix">
                                    {!! $data[$key]['level']!!}
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <nav class="pb-4 d-flex justify-content-center">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
{{--                                        <a class="nav-item nav-link  text-dark" id="nav-profile-tab" data-toggle="tab"--}}
{{--                                           href="#nav-profile-{{$key}}" role="tab"--}}
{{--                                           aria-controls="nav-profile-{{$key}}"--}}
{{--                                           aria-selected="false">Lịch có thể dạy</a>--}}
                                        <a class="nav-item nav-link  text-dark" id="nav-contact-tab" data-toggle="tab"
                                           href="#nav-contact-{{$key}}" role="tab"
                                           aria-controls="nav-contact-{{$key}}"
                                           aria-selected="false">Video dạy mẫu</a>
                                    </div>
                                </nav>
                                <div class="tab-content " id="nav-tabContent">
{{--                                    <div class="tab-pane fade active show" id="nav-profile-{{$key}}" role="tabpanel"--}}
{{--                                         aria-labelledby="nav-profile-tab">--}}
{{--                                        {!!$data[$key]['table']!!}--}}
{{--                                    </div>--}}
                                    <div class="tab-pane fade active show" id="nav-contact-{{$key}}" role="tabpanel"
                                         aria-labelledby="nav-contact-tab">
                                        {!! $data[$key]['video'] !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <style>
        td, th {
            border: 1px solid #c5c5c5b0;
            text-align: center;
        }
        .shadow{
            box-shadow: 0 2px 2px 0 #0000003d;
            position: relative;
            top:65px;
        }
        .top-bar{
            background-image:url("https://png.pngtree.com/thumb_back/fw800/back_our/20190621/ourmid/pngtree-minimalistic-geometric-atmosphere-business-flat-blue-background-image_198436.jpg") ;
            background-size: cover;
            margin-bottom: 100px;
        }
    </style>
    <script>
        $('td').each(function () {
            this.width = "40px";
        });
        $("table").css('width', "400px");
        $("td").each(function () {
            if ($(this).html() != "&nbsp;") {
                $(this).addClass("text-origin")
                $(this).addClass("bg-origin")
                $(this).html("Hav")
            }
        });
    </script>
    <script>
        $('input').nicelabel({

            // use labels
            uselabel: true,

            // text for checked state
            checked_text: 'Checked',

            // text for unchecked state
            unchecked_text: 'Unchecked',

            // icon for checked state
            {{--checked_ico: '{{asset('asset//nicelabel/ico/tick-checked.png')}}',--}}

            // icon for unchecked state
            {{--unchecked_ico: '{{asset('asset//nicelabel/ico/tick-unchecked.png')}}',--}}

        });
    </script>
    <script>
        $('iframe').each(function () {
            this.width = "100%";
            this.height = "250px";
        });

    </script>
@endsection
