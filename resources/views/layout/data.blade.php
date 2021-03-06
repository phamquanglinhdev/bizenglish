<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Bizenglish APP</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet"/>
    <link href="{{asset("apps/css/styles.css")}}" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"
            crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
    <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{route("app.index")}}">Biz Data</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
{{--    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">--}}
{{--        <div class="input-group">--}}
{{--            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />--}}
{{--            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>--}}
{{--        </div>--}}
{{--    </form>--}}
<!-- Navbar-->
    {{--    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">--}}
    {{--        <li class="nav-item dropdown">--}}
    {{--            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>--}}
    {{--            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">--}}
    {{--                <li><a class="dropdown-item" href="#!">Settings</a></li>--}}
    {{--                <li><a class="dropdown-item" href="#!">Activity Log</a></li>--}}
    {{--                <li><hr class="dropdown-divider" /></li>--}}
    {{--                <li><a class="dropdown-item" href="#!">Logout</a></li>--}}
    {{--            </ul>--}}
    {{--        </li>--}}
    {{--    </ul>--}}
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    @if(backpack_user()->role==0)
                        <div class="sb-sidenav-menu-heading">Th???ng k??</div>
                        <a class="nav-link" href="{{route("app.index")}}">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            B???ng ??i???u khi???n
                        </a>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                           data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            L???p h???c
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route("app.room.create")}}">T???o l???p h???c</a>
                                <a class="nav-link" href="{{route("app.room.list")}}">Danh s??ch l???p h???c</a>
                            </nav>
                        </div>

                    @endif
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                       aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        H???c sinh
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="{{route('student.index')}}">H??? s?? c??c h???c sinh</a>
                            @if(backpack_user()->role==0)
                                <a class="nav-link" href="{{route("student.create")}}">T???o h??? s?? h???c sinh</a>
                                <a class="nav-link" href="{{route("app.staccount.create")}}">T???o t??i kho???n h???c sinh</a>
                            @endif
                        </nav>
                    </div>
                    @if(backpack_user()->role==0)
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#partner"
                           aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            ?????i t??c
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="partner" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="{{route('app.partner.index')}}">H??? s?? c??c ?????i t??c</a>
                                @if(backpack_user()->role==0)
                                    <a class="nav-link" href="{{route("app.partner.create")}}">T???o h??? s?? ?????i t??c</a>
                                @endif
                            </nav>
                        </div>
                    @endif
                    @if(backpack_user()->role==0)
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#teacher"
                           aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                            Gi??o vi??n
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="teacher" aria-labelledby="headingOne"
                             data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
{{--                                <a class="nav-link" href="{{route('app.partner.index')}}">H??? s?? c??c ?????i t??c</a>--}}
                                @if(backpack_user()->role==0)
                                    <a class="nav-link" href="{{route("teacher.index")}}">Danh s??ch gi??o vi??n</a>
                                @endif
                            </nav>
                        </div>
                    @endif
                    <div class="sb-sidenav-menu-heading">H??nh ?????ng</div>
                    <a class="nav-link" href="{{route("app.log.create")}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-check"></i></div>
                        ??i???m danh gi??? h???c
                    </a>
                    <div class="sb-sidenav-menu-heading">D??? li???u</div>
                    <a class="nav-link" href="{{route("app.log.list")}}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Nh???t k??
                    </a>
                    {{--                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">--}}
                    {{--                        <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>--}}
                    {{--                        Pages--}}
                    {{--                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
                    {{--                    </a>--}}
                    {{--                    <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">--}}
                    {{--                        <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">--}}
                    {{--                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">--}}
                    {{--                                Authentication--}}
                    {{--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
                    {{--                            </a>--}}
                    {{--                            <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">--}}
                    {{--                                <nav class="sb-sidenav-menu-nested nav">--}}
                    {{--                                    <a class="nav-link" href="#">Login</a>--}}
                    {{--                                    <a class="nav-link" href="#">Register</a>--}}
                    {{--                                    <a class="nav-link" href="#">Forgot Password</a>--}}
                    {{--                                </nav>--}}
                    {{--                            </div>--}}
                    {{--                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">--}}
                    {{--                                Error--}}
                    {{--                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>--}}
                    {{--                            </a>--}}
                    {{--                            <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">--}}
                    {{--                                <nav class="sb-sidenav-menu-nested nav">--}}
                    {{--                                    <a class="nav-link" href="#">401 Page</a>--}}
                    {{--                                    <a class="nav-link" href="#">404 Page</a>--}}
                    {{--                                    <a class="nav-link" href="#">500 Page</a>--}}
                    {{--                                </nav>--}}
                    {{--                            </div>--}}
                    {{--                        </nav>--}}
                    {{--                    </div>--}}

                    {{--                    <a class="nav-link" href="#">--}}
                    {{--                        <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>--}}
                    {{--                        Charts--}}
                    {{--                    </a>--}}
                    {{--                    <a class="nav-link" href="#">--}}
                    {{--                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>--}}
                    {{--                        Tables--}}
                    {{--                    </a>--}}
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">????ng nh???p b???ng: {{backpack_user()->name}}</div>
                <div><a class="text-danger btn link-style-none" href="{{route("backpack.auth.logout")}}">????ng xu???t</a>
                </div>
                <div><a class="text-primary btn link-style-none" href="{{route("backpack.dashboard")}}">V??? Trang
                        Admin</a></div>
                <div><a class="text-success btn link-style-none" href="{{route("index")}}">V??? Trang Ch???</a></div>
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        @yield("main")
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                {{--                <div class="d-flex align-items-center justify-content-between small">--}}
                {{--                    <div class="text-muted">Copyright &copy; Your Website 2021</div>--}}
                {{--                    <div>--}}
                {{--                        <a href="#">Privacy Policy</a>--}}
                {{--                        &middot;--}}
                {{--                        <a href="#">Terms &amp; Conditions</a>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
            </div>
        </footer>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
<script src="{{asset("apps/js/scripts.js")}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset("apps/assets/demo/chart-area-demo.js")}}"></script>
<script src="{{asset("apps/assets/demo/chart-bar-demo.js")}}"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="{{asset("apps/js/datatables-simple-demo.js")}}"></script>
</body>
</html>
