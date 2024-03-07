@extends('layouts.master')

@section('title')
    Đăng Nhập
@endsection

@section('content')

    <body class="bg-gradient-primary">

        <div class="container">

            <!-- Outer Row -->
            <div class="row justify-content-center">

                <div class="col-xl-10 col-lg-12 col-md-9">

                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Chào Mừng Trở Lại!</h1>
                                        </div>

                                        @if (!empty($_SESSION['errors']))
                                            <div>
                                                <ul>
                                                    @foreach ($_SESSION['errors'] as $key => $error)
                                                        <li style="color: red; font-weight: 500">Lỗi: {{ $error }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form form action="" method="POST" enctype="multipart/form-data"
                                            class="user">
                                            <div class="form-group">
                                                <input input type="text" id="name" placeholder="Nhập Email"
                                                    name="email" class="form-control form-control-user"
                                                    id="exampleInputEmail" aria-describedby="emailHelp"
                                                    value="{{ isset($_POST['email']) ? $_POST['email'] : '' }}">
                                            </div>
                                            <div class="form-group">
                                                <input input type="password" id="password" placeholder="Nhập Mật Khẩu"
                                                    name="password" class="form-control form-control-user"
                                                    id="exampleInputPassword">
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck">
                                                    <label class="custom-control-label" for="customCheck">Nhớ Tài
                                                        Khoản</label>
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-user btn-block" type="submit">Đăng
                                                Nhập</button>

                                            <hr>

                                            <a href="index.html" class="btn btn-google btn-user btn-block">
                                                <i class="fab fa-google fa-fw"></i> Đăng Nhập Với Google
                                            </a>
                                            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                                <i class="fab fa-facebook-f fa-fw"></i> Đăng Nhập Với Facebook
                                            </a>
                                        </form>
                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="forgot-password.html">Quên Mật Khẩu?</a>
                                        </div>
                                        <div class="text-center">
                                            <a class="small" href="/register">Tạo Tài Khoản!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

    </body>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng Nhập</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Đăng Nhập</h1>

        @if (!empty($_SESSION['errors']))
            <div>
                <ul>
                    @foreach ($_SESSION['errors'] as $key => $error)
                        <li>Key: {{ $key }} - Error: {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Email:</label>
                    <input type="text" class="form-control" id="name" required placeholder="Nhập Email"
                        name="email">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Mật Khẩu:</label>
                    <input type="password" class="form-control" id="password" required placeholder="Nhập Mật Khẩu"
                        name="password">
                </div>
                <button type="submit" class="btn btn-primary">Đăng Nhập</button>
            </form>
        </div>
    </div>

</body>

</html> --}}
