@extends("layout.data")
@section("main")
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tạo hồ sơ đối tác</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dành cho nhân viên</li>
        </ol>
    </div>
    <div class="container-fluid ">
        <form class="px-2 col-lg-6 bg-light" method="POST" action="{{route("app.partner.store")}}">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Tên đối tác</label>
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
                <label for="phone">Số điện thoại đối tác</label>
                <input type="text" class="form-control"

                       id="phone" name="phone" placeholder="" required/>
            </div>
            <div class="form-group mb-3">
               Mật khẩu mặc định là email của đối tác
            </div>
            <button type="submit" class="btn btn-primary">Tạo đối tác</button>
        </form>
    </div>
    <style>
        .chosen-container {
            width: 100% !important;
        }
    </style>
@endsection
