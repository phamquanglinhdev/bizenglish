@extends('layout.data')
@section("main")
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Nhật ký</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Nhật ký</li>
            </ol>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Thống kê nhật ký toàn bộ
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                        <tr>
                            <th>Ngày dạy</th>
                            <th>Khung giờ dạy</th>
                            <th>Giáo viên</th>
                            <th>Đối tác</th>
                            <th>Lớp học</th>
                            <th>Tên bài học</th>
                            <th>Nội dung</th>
                            <th>Thời lượng</th>
                            @if(backpack_user()->role <= 1)
                                <th>Rate Per Hour</th>
                                <th>Rate For Clas</th>
                            @endif
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            @if(isset($log->lesson_name))
                                <tr>
                                    <td>{{date_format(date_create($log->day_log),"d-m-Y")}}</td>
                                    <td>{{$log->time_log}}</td>
                                    <td>{{$log->getUsers()->first()->name}}</td>
                                    <td>{{$log->getPartner()->first()->name}}</td>
                                    <td>{{$log->getRooms()->first()->name}}</td>
                                    <td>{{$log->lesson_name}}</td>
                                    <td>{{$log->content}}</td>
                                    <td>{{$log->duration}}</td>
                                    @if(backpack_user()->role <= 1)
                                        <td>{{$log->rate_per_hour}}</td>
                                        <td>{{$log->rate_for_class}}</td>
                                    @endif
                                    <td>{{$log->comment}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
