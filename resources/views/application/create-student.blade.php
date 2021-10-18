@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tạo hồ sơ</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho nhân viên</li>
        </ol>
    </div>
    <div class="container-fluid ">
        <form class="px-2 col-lg-6 bg-light"
            @if(isset($old->id))
            action="{{route("student.update",$old->id)}}"
            @else
            action="{{route("student.store")}}"
            @endif method="post">
            @csrf
            @if(isset($old->id))
                {{ method_field('PATCH') }}
            @else
                {{ method_field('POST') }}
            @endif
            @if(!isset($old->id))

                <div class="form-group mb-3">
                    <label for="user_id">Chọn học sinh</label>
                    <select id="user_id" name="user_id" class="form-control">
                        @foreach($students as $student)
                            @if(!isset($student->student()->first()->id))
                                <option value="{{$student->id}}">{{$student->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <small>Học sinh chưa có trong danh sách ? <a href="{{route("app.staccount.create")}}">Tạo ngay</a></small>
                </div>
            @endif
            <div class="form-check">
                <input class="form-check-input" type="radio" name="pro" value="1" id="defaultCheck1" required
                @if(isset($old->pro))
                    {{$old->pro==1?"checked":""}}
                    @endif
                >
                <label class="form-check-label" for="defaultCheck1">
                    Học sinh tiềm năng
                </label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="radio" value="0" name="pro" id="defaultCheck2" required
                @if(isset($old->pro))
                    {{$old->pro==0?"checked":""}}
                    @endif
                >
                <label class="form-check-label" for="defaultCheck2">
                    Học sinh không tiềm năng
                </label>
            </div>

            <div class="form-group mb-3">
                <label for="state">Trạng thái</label>
                <select name="state" class="form-control" id="state">
                    @if(isset($old->state))
                        <option selected>{{$old->state}}</option>
                    @endif
                    <option>Chưa học thử</option>
                    <option>Đã học thử</option>
                    <option>Đã đăng ký</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label for="package_name">Gói đăng ký</label>
                <input type="text" class="form-control"
                       value="{{isset($old->package_name)?$old->package_name:""}}"
                       id="package_name" name="package_name" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
                <label for="lesson">Số buổi học</label>
                <input type="number" class="form-control" id="lesson"
                       value="{{isset($old->lesson)?$old->lesson:""}}"
                       name="lesson" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
                <label for="daily_time">Số phút / buổi</label>
                <input type="number" class="form-control" id="daily_time"
                       value="{{isset($old->daily_time)?$old->daily_time:""}}"
                       name="daily_time" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
                <label for="total_time">Tổng số phút dạy</label>
                <input type="number" class="form-control" id="total_time"
                       value="{{isset($old->total_time)?$old->total_time:""}}"
                       name="total_time" placeholder=""/>
            </div>
            <div class="form-group mb-3">
                <label for="fee">Tổng học phí</label>
                <input type="number" class="form-control" id="fee"
                       value="{{isset($old->fee)?$old->fee:""}}"
                       name="fee" placeholder=""/>
            </div>
            <div class="form-group mb-3">
                <label for="fee">Học phí đã đóng - Ngày đóng</label>
                <div class="input-group">
                    <input type="number"
                           value="{{isset($old->paid)?$old->paid:""}}"
                           name="paid" class="form-control">
                    <input type="date"
                           value="{{isset($old->paid_day)?$old->paid_day:""}}"
                           name="paid_day" class="form-control">
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="fee">Ngày hẹn đóng</label>
                <input type="date" class="form-control" id="exp_paid"
                       value="{{isset($old->exp_day)?$old->exp_day:""}}"
                       name="exp_day" placeholder=""/>
                <small class="text-muted">(Để trống nếu đã đóng hoặc ghi "chưa hẹn " nếu chưa hẹn đóng)</small>
            </div>
            <div class="form-group mb-3">
                <label for="comment">Ghi chú</label>
                <textarea type="text" class="form-control" id="comment"
                          name="comment"
                          placeholder="Ghi chú">{{isset($old->comment)?$old->comment:"Ghi chú"}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>
    <style>
        .chosen-container {
            width: 100% !important;
        }
    </style>
@endsection
