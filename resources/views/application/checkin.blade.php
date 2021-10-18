@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Điểm danh giờ dạy</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho giáo viên</li>
        </ol>
    </div>
    <div class="container-fluid bg-white">
        <form action="{{route("app.log.store")}}" class="col-lg-6 bg-light p-md-3 rounded" method="post">
            @csrf
            <div class="form-group mb-3">
                <label class="font-weight-bold mb-1"  for="day_log">Ngày dạy</label>
                <input type="date" class="form-control" id="day_log" name="day_log" required/>
            </div>
            <div class="form-group mb-3">
                <label class="font-weight-bold mb-1"  for="day_log">Khung giờ dạy</label>
                <input type="text" placeholder="8:30-9:00 PM" class="form-control" id="time_log" name="time" required/>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-md-6">
                    <label class="font-weight-bold mb-1"  for="room_id">Phòng học</label>
                    <select class="form-control" id="room_id" name="room_id">
                        @foreach($rooms as $room)
                            <option value="{{$room->id}}">{{$room->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="font-weight-bold mb-1"  for="room_id">Đối tác</label>
                    <select class="form-control" id="partner_id" name="partner_id">
                        <option></option>
                        @foreach($partners as $partner)
                            <option value="{{$partner->id}}">{{$partner->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-md-6">
                    <label class="font-weight-bold mb-1"  for="lesson_name">Tên bài học</label>
                    <input type="text" class="form-control" id="lesson_name" name="lesson_name"
                           placeholder="Super Kid 1,Unit 1" required/>
                </div>
                <div class="form-group mb-3 col-md-6">
                    <label class="font-weight-bold mb-1"  for="content">Nội dung</label>
                    <input type="text" class="form-control" id="content" name="contents" placeholder="About Family"
                           required/>
                </div>            </div>
            <div class="row">
                <div class="form-group mb-3 col">
                    <label class="font-weight-bold mb-1"  for="duration">Thời gian dạy (phút)</label>
                    <input type="text" class="form-control" id="duration" name="duration" placeholder="VD: 30 phút"
                           required/>
                </div>
                <div class="form-group mb-3 col">
                    <label class="font-weight-bold mb-1"  for="rate_per_hour">Rete Per Hour</label>
                    <input type="number" class="form-control" id="rate_per_hour" name="rate_per_hour" placeholder="120"
                           required/>
                </div>
                <div class="form-group mb-3 col">
                    <label class="font-weight-bold mb-1"  for="rate_for_class">Rete For Class</label>
                    <input type="number" class="form-control" id="rate_for_class" name="rate_for_class" placeholder="80"
                           required/>
                </div>
            </div>
            <div class="form-group mb-3">
                <label class="font-weight-bold mb-1"  for="comment">Bình luận thêm</label>
                <textarea rows="12" type="text" class="form-control" id="comment" name="comment" placeholder="Ghi chú"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Điểm danh</button>
        </form>
    </div>
@endsection
