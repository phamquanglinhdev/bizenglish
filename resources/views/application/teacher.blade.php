@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Hồ sơ các giáo viên</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho nhân viên</li>
        </ol>

        <div class="card mb-4">
            {{--            <div class="card-header">--}}
            {{--                <i class="fas fa-table me-1"></i>--}}
            {{--                Thống kê nhật ký toàn bộ--}}
            {{--            </div>--}}
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Số điện thoại</th>
                        <th>Email</th>
                        <th>Avatar</th>
                        <th colspan="3" class="text-center">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($teachers as $key => $teacher )
                        <tr>
                            <td>{{$key}}</td>
                            <td>{{$teacher->name}}</td>
                            <td>{{$teacher->phone}}</td>
                            <td>{{$teacher->email}}</td>
                            <td class="w-25">
                                <div class="w-25">
                                    <img src="{{$teacher->avatar}}" class="w-25">
                                </div>
                            </td>
                            <td>
                                                                    <a class="w-100 btn btn-success btn-block"
                                                                       href="{{route("teacher.show",$teacher->id)}}">Xem</a>
                            </td>
                            @if(backpack_user()->role == 0)
                                <td>
                                    {{--                                        <a class="w-100 btn btn-warning btn-block"--}}
                                    {{--                                           href="{{route("student.edit",$student->id)}}">Sửa</a>--}}
                                </td>
                                <td>
                                    {{--                                        <form action="{{ route('student.destroy', ['student' => $student->id]) }}"--}}
                                    {{--                                              method="POST">--}}
                                    {{--                                            @csrf--}}

                                    {{--                                            @method('DELETE')--}}
                                    {{--                                            <button type="submit" class="w-100 btn btn-danger btn-block">Xoá</button>--}}
                                    {{--                                        </form>--}}
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
