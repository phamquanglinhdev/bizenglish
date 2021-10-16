@extends("layout.data")
@section("main")

    <div class="container-fluid px-4">
        <h1 class="mt-4">{{isset($old)?"Chỉnh sửa lớp ".$old->name:"Tạo lớp học"}}</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho nhân viên</li>
        </ol>
    </div>
    <div class="container-fluid bg-light">
        @if(isset($old))
            <form class="px-2 col-lg-6 bg-light" action="{{route("app.room.update",$old->id)}}" method="post">
                {{ method_field('PUT') }}
        @else
            <form class="px-2 col-lg-6 bg-light" action="{{route("app.room.store")}}" method="post">
        @endif
        @csrf
        <div class="form-group mb-3">
            <label for="lesson_name">Tên phòng học</label>
            <input type="text" class="form-control"
                   value="{{isset($old->name)?$old->name:""}}"
                   id="lesson_name" name="name" placeholder="Nhập tên phòng học" required/>
        </div>
        <div class="form-group mb-3">
            <label for="salary">Lương chi trả (cho 1 giờ)</label>
            <input type="text" class="form-control" id="salary"
                   value="{{isset($old->salary)?$old->salary:""}}"
                   name="salary" placeholder="VD : 120000" required/>
        </div>
        <div class="form-group mb-3">
            <label for="time">Lịch học</label>
            <input type="text" class="form-control"
                   value="{{isset($old->time)?$old->time:""}}"
                   id="time" name="time" placeholder="VD : 18:00-18-30 Thứ Năm" required/>
        </div>
        <div class="form-group mb-3">
            <label for="document">Tài liệu (Link GG Drive)</label>
            <input type="text" class="form-control" id="document"
                   value="{{isset($old->document)?$old->document:""}}"
                   name="document" placeholder="https://drive.google.com/abcxyz" required/>
        </div>
        <div class="form-group mb-3">
            <label for="teacher_id">Giáo viên đứng lớp</label>
            <select id="teacher_id" data-placeholder="Chọn giáo viên" class="chosen-select form-control"
                    name="teacher_id[]" multiple="multiple">
                @foreach($teachers as $teacher )
                    @if(isset($old->teachers))
                        @if(in_array($teacher->id,$old->teachers) )
                            <option value="{{$teacher->id}}" selected>{{$teacher->name}}</option>
                        @endif
                    @else
                    @endif
                    <option value="{{$teacher->id}}">{{$teacher->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="student_id">Học sinh </label>
            <select id="student_id" data-placeholder="Chọn học sinh" multiple class="chosen-select form-control"
                    name="student_id[]" multiple="multiple">
                @foreach($students as $student )
                    @if(isset($old->students))
                        @if(in_array($student->id,$old->students))
                            <option value="{{$student->id}}" selected>{{$student->name}}</option>
                        @endif
                    @else
                    @endif
                    <option value="{{$student->id}}">{{$student->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group mb-3">
            <label for="comment">Ghi chú</label>
            <textarea type="text" class="form-control" id="comment"
                      name="comment" placeholder="Ghi chú">{{isset($old->comment)?$old->comment:"Ghi chú"}}</textarea>
        </div>
        @if(isset($old))
             <button type="submit" class="btn btn-primary">Cập nhật</button>
        @else
             <button type="submit" class="btn btn-primary">Tạo lớp</button>
        @endif
        </form>
    </div>
    <style>
        .chosen-container {
            width: 100% !important;
        }
    </style>
    <script>
        $(".chosen-select").chosen({
            no_results_text: "Oops, nothing found!"
        })
    </script>
@endsection
