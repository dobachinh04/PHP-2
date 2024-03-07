@extends('layouts.master')

@section('title')
    Cập Nhật Người Dùng
@endsection

@section('dashboard')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Cập Nhật Người Dùng</h1>

        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Thêm mới Danh Mục</h6>
                            </div> --}}
            <div class="card-body">
                <div class="row m-auto">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Họ và Tên:</label>
                            <input type="text" class="form-control" id="name" required placeholder="Nhập Họ và Tên"
                                name="name" value="{{ $user['name'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" required placeholder="Nhập email"
                                name="email" value="{{ $user['email'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật Khẩu:</label>
                            <input type="text" class="form-control" id="password" required placeholder="Nhập Mật Khẩu"
                                name="password" value="{{ $user['password'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Ảnh:</label>
                            <input type="file" id="avatar" name="avatar"> <br>
                            <img class="mt-3" src="{{ $user['avatar'] }}" width="100px">
                        </div>
                        <a href="/admin/users" class="btn btn-secondary" style="color: white;"><-- Quay Lại Danh Sách</a>
                                <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
@endsection

{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cập Nhật Người Dùng: {{ $user['name'] }}</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Cập Nhật Người Dùng: {{ $user['name'] }}</h1>

        <a href="/admin/users" class="btn btn-info" style="font-weight: bold; color: white;"><-- Quay Lại Danh Sách</a>

                <div class="row">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="name" class="form-label">Họ và Tên:</label>
                            <input type="text" class="form-control" id="name" required
                                placeholder="Nhập Họ và Tên" name="name" value="{{ $user['name'] }}">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="text" class="form-control" id="email" required placeholder="Nhập email"
                                name="email" value="{{ $user['email'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mật Khẩu:</label>
                            <input type="text" class="form-control" id="password" required
                                placeholder="Nhập Mật Khẩu" name="password" value="{{ $user['password'] }}">
                        </div>
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Ảnh:</label>
                            <input type="file" class="form-control" id="avatar" name="avatar">
                            <img class="mt-3" src="{{ $user['avatar'] }}" width="100px">
                        </div>
                        <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    </form>
                </div>
    </div>

</body>

</html> --}}
