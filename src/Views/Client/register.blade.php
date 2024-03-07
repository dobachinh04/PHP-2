@extends('layouts.master')

@section('title')
    Đăng Ký
@endsection

@section('content')

    <body class="bg-gradient-primary">

        <div class="container pt-2">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                        <div class="col-lg-7">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Tạo Tài Khoản!</h1>
                                </div>

                                @if (!empty($_SESSION['errors_register']))
                                    <div>
                                        <ul>
                                            @foreach ($_SESSION['errors_register'] as $key => $errors_register)
                                                <li style="color: red; font-weight: 500">Lỗi: {{ $errors_register }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form class="user" method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <div class="col-sm-12 mb-3 mb-sm-0">
                                            <input type="text" name="name" class="form-control form-control-user"
                                                id="exampleFirstName" placeholder="Họ và Tên" value="{{ isset($_POST['name']) ? $_POST['name'] : '' }}">
                                        </div>
                                        {{-- <div class="col-sm-6">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleLastName" placeholder="Last Name">
                                        </div> --}}
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" placeholder="Email" value="{{ isset($_POST['email']) ? $_POST['email'] : '' }}">
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                            <input type="password" name="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Mật Khẩu">
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="password" name="re_password" class="form-control form-control-user"
                                                id="exampleRepeatPassword" placeholder="Nhập Lại Mật Khẩu">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">Đăng Ký</button>
                                    <hr>
                                    <a href="index.html" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Đăng Ký Với Google
                                    </a>
                                    <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Đăng Ký Với Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">Quên Mật Khẩu?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="/auth/login">Đã Có Tài Khoản? Đăng Nhập Ngay!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="/assets/client/vendor/jquery/jquery.min.js"></script>
        <script src="/assets/client/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="/assets/client/vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="/assets/client/js/sb-admin-2.min.js"></script>

    </body>
@endsection
