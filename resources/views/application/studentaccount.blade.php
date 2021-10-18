@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tạo tài khoản học sinh</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho nhân viên</li>
        </ol>
    </div>
    <div class="container-fluid ">
        <form class="px-2 col-lg-6 bg-light" method="POST" action="{{route("app.staccount.store")}}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Tên học sinh</label>
                <input type="text" class="form-control"
                       id="name" name="name" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
                <label for="name">Email</label>
                <input type="email" class="form-control"
                       id="email" name="email" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
                <label for="package_name">Avatar</label>
                <input type="text" class="form-control"
                       id="avatar" name="avatar" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
                <label for="phone">Số điện thoại</label>
                <input type="text" class="form-control"

                       id="phone" name="phone" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
                Mật khẩu mặc định là email của học sinh
            </div>
            <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
        </form>
    </div>
    <style>
        .chosen-container {
            width: 100% !important;
        }
    </style>
@endsection
