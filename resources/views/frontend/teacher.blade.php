@php
    $teacher = \App\Models\User::where('id','=',$id)->first();
    if(isset($teacher) && $teacher->role == 1){
       $prolife = $teacher->prolife()->first();
    }

@endphp
@extends('layout.app')
@section('content')
    @if(isset($teacher) && $teacher->role==1 && isset($prolife))
        @php
            $title ='Giáo viên '.$teacher->name;
        @endphp
        <link rel="stylesheet" href="{{asset('asset/css/teacher.css')}}">

        <div class="text-dark">
            <div class="bg-thumbnail">
                <div class="container py-5 text-white">
                    <div class="row align-items-center">
                        <div class="d-none col-md-3 d-lg-block">
                            <img src="{{$teacher->avatar}}" class="img-fluid">
                        </div>
                        <div class="h1 col-md-9">Giáo Viên : {{$teacher->name}}</div>
                    </div>
                </div>
            </div>
            <div class="container py-5">
                <div class=" rounded  p-3">
                    <div class="h4"><i class="fas fa-book pb-2"></i> Giới thiệu</div>
                    <div>{!! $prolife->level !!}</div>
{{--                    <div class="h4"><i class="fas fa-clock"></i> Thời gian nhận lớp</div>--}}
{{--                    <div class="teaching" id="teaching">--}}
{{--                        {!! $prolife->celendar !!}--}}
{{--                    </div>--}}
{{--                    <div class="h4 py-3"><i class="fas fa-money-bill-wave"></i></i> Học phí</div>--}}
{{--                    <div class="salary">--}}
{{--                        {!! $prolife->salary !!}--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
        <div class="container">
            <div class="text-center text-origin py-5 h1">Đánh giá</div>
            @php
                $totalRateF = $comments->count();
                if($totalRateF == 0){
                    $totalRate=1;
                }else{
                    $totalRate=$totalRateF;
                }
                $avg = round($comments->average('rate'),1);
                $ratingCount [1] =0;
                $ratingCount [2] =0;
                $ratingCount [3] =0;
                $ratingCount [4] =0;
                $ratingCount [5] =0;
                if(isset($comments)){
                foreach ($comments as $comment){
                    switch ($comment->rate){
                        case 1:$ratingCount[1]++;break;
                        case 2:$ratingCount[2]++;break;
                        case 3:$ratingCount[3]++;break;
                        case 4:$ratingCount[4]++;break;
                        case 5:$ratingCount[5]++;break;
                    }
                }
                }
            @endphp
            <div class="row">
                <div class="col-md-6">
                    <div class="bg-light p-5">
                        <div class="text-dark h5">Đánh giá trung bình</div>
                        <div class="h1">{{$avg}} <i class=" text-warning fas fa-star text-warning mr-2"></i></div>
                        <div>{{$totalRateF}} đánh giá</div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                             role="progressbar" style="width: {{$ratingCount[5]/$totalRate*100}}%" aria-valuenow="25"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-info" role="progressbar"
                             style="width: {{$ratingCount[4]/$totalRate*100}}%" aria-valuenow="50"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                             role="progressbar" style="width: {{$ratingCount[3]/$totalRate*100}}%" aria-valuenow="75"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-danger"
                             role="progressbar" style="width: {{$ratingCount[2]/$totalRate*100}}%" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="my-3 progress">
                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-dark" role="progressbar"
                             style="width: {{$ratingCount[1]/$totalRate*100}}%" aria-valuenow="100"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="max-height: 400px; overflow-y:scroll ; scroll-behavior: smooth ">
            @foreach($comments as $comment)
                @if(isset($comment->users()->first()->name))
                <div class="media p-5 bg-light mt-2">
                    <img class="mr-3 " style="max-width: 80px ;height: auto"
                         src="{{$comment->users()->first()->avatar}}" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0">{{$comment->users()->first()->name}}</h5>
                        <h5>@for($i=1;$i<=$comment->rate;$i++)
                                <i class="fas fa-star text-warning"></i>
                            @endfor</h5>
                        <p>{{$comment->content}}</p>
                        @if(backpack_auth()->check())
                            @if(backpack_user()->id == $comment->users()->first()->id || backpack_user()->role ==0)
                                <span class="text-muted">{{$comment->updated_at}} </span>
                                <a href="{{route('delete.comment',['teacher'=>$teacher->id,'id'=>$comment->id])}}">Xóa</a>
                            @endif
                        @endif
                    </div>
                </div>
                @endif
            @endforeach
        </div>
        <div class="container">
            <div class="pt-5">
                @if(backpack_auth()->check())
                    <div class="h3">Đánh giá của bạn</div>
                    <form class="rating bg-light p-5" action="{{route('save.comment',['id'=>$teacher->id])}}"
                          method="post">
                        @csrf
                        <input type="hidden" value="{{$teacher->id}}" name="teacher_id">
                        <input type="hidden" value="{{backpack_user()->id}}" name="user_id">
                        <input type="radio" id="star5" name="rate" value="5"/>
                        <label for="star5" title="text">5 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star4" name="rate" value="4"/>
                        <label for="star4" title="text">4 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star3" name="rate" value="3"/>
                        <label for="star3" title="text">3 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star2" name="rate" value="2"/>
                        <label for="star2" title="text">2 <i class="fas fa-star text-warning mr-2"></i></label>
                        <input type="radio" id="star1" name="rate" value="1"/>
                        <label for="star1" title="text">1 <i class="fas fa-star text-warning mr-2"></i></label>
                        <div>
                            <textarea class="form-control" name="contents" placeholder="Đánh giá của bạn" required></textarea>
                        </div>
                        <div class="text-right pt-2">
                            <button class="btn btn-origin pointed" type="submit">Gửi</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @else
        <div class="container text-center p-5 text-origin h1">Không tìm thấy thông tin giáo viên</div>
    @endif
    <style>
        .bg-thumbnail {
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('{{$teacher->avatar}}');
            background-size: cover;
            background-position: center;

        }

        .teaching td,.teaching th {
            padding: 5px;
            text-align: center;
            width: 100px;
        }

        .teaching table {
            margin-top:30px ;
            min-width: 100% !important;

        }

        .box-shadow-white {
            box-shadow: 0 0 11px 6px #ffffff85
        }

        .bg-card {
            background: linear-gradient(
                100deg, #844646, transparent);
            background-size: cover;
        }
        .salary th{
            width: 150px;
            text-align: center;
        }
        .salary table{
            width: 100%!important;
        }
        .salary td{
            text-align: center;
        }
        .salary td:nth-child(4){
            width: 500px;
            padding: 5px;
            text-align: left;
        }
    </style>
    <script>
        // $('.salary td')[2].width="500px";
        // $('.salary td')[2].css("padding","5px");
    </script>
@endsection
