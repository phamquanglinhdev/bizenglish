@extends('layout.data')
@section("main")
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Danh sách lớp học</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Danh sách lớp học</li>
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
                            <th>Tên lớp</th>
                            <th>Lịch học</th>
                            <th>Giáo viên tham gia</th>
                            <th>Học sinh tham gia</th>
                            <th>Học phí 1 giờ</th>
                            <th>Tài liệu</th>
                            <th>Ghi chú</th>
                            <th colspan="2">Hành động</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rooms as $room)
                            @if(isset($room->name))
                                <tr>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->time}}</td>
                                    <td>
                                        @foreach($room->getTeacher()->get() as $teacher)
                                            {{$teacher->name}},
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($room->getStudent()->get() as $student)
                                            {{$student->name}},
                                        @endforeach
                                    </td>
                                    <td>{{number_format($room->salary)}} đ</td>
                                    <td>
                                        <a href="{{$room->document}}">{{$room->document}}</a>
                                    </td>
                                    <td>
                                        <blockquote>{{$room->comment}}</blockquote>
                                    </td>
                                    @if(backpack_user()->role == 0)
                                        <td>
                                            <a class="w-100 btn btn-warning btn-block" href="{{route("app.room.edit",$room->id)}}">Sửa</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('app.room.destroy', ['id' => $room->id]) }}" method="POST">
                                                @csrf

                                                @method('DELETE')
                                                <button type="submit" class="w-100 btn btn-danger btn-block">Xoá</button>
                                            </form>
                                        </td>
                                    @endif
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
