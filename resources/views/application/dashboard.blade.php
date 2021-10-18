@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Bảng điều khiển</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">BizData</li>
        </ol>

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body"><span class="h2">{{$count->student}}</span> Học sinh</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route("student.index")}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body"><span class="h2">{{$count->room}}</span> Lớp học</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{route("app.room.list")}}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body"><span class="h2">{{$count->teacher}}</span> Giáo viên</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body"><span class="h2">{{$count->admin}}</span> Nhân Viên</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
{{--                        <a class="small text-white stretched-link" href="#">View Details</a>--}}
                        <div class="small text-white"><i class="fas fa-adjust"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
