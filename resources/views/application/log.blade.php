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
                            <th>Giáo viên</th>
                            <th>Mốc Thời gian</th>
                            <th>Lớp học</th>
                            <th>Tên bài học</th>
                            <th>Thời lượng</th>
                            <th>Thù lao tương ứng</th>
                            <th>Comment</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $log)
                            @if(isset($log->lesson_name))
                                <tr>
                                    <td>{{$log->getUsers()->first()->name}}</td>
                                    <td>{{$log->updated_at}}</td>
{{--                                    <td>{{$log->getRooms()->first()->name}}</td>--}}
                                    <td>{{$log->lesson_name}}</td>
                                    <td>{{$log->duration}}</td>
                                    <td>{{number_format($log->salary)}} đ</td>
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
