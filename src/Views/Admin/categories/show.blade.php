@extends('layouts.master')

@section('title')
    Xem Chi Tiết: {{ $category['name'] }}
@endsection

@section('dashboard')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <h1 class="h3 mb-2 text-gray-800">Xem Chi Tiết: {{ $category['name'] }}</h1>

        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Thêm mới Danh Mục</h6>
                            </div> --}}
            <div class="card-body">
                <div class="row m-auto">
                    <table class="table">
                        <tr>
                            <th>Tên Trường</th>
                            <th>Giá Trị</th>

                        </tr>

                        <tr>
                            <td>ID</td>
                            <td>{{ $category['id'] }}</td>
                        </tr>

                        <tr>
                            <td>Tên</td>
                            <td>{{ $category['name'] }}</td>
                        </tr>

                        <tr>
                            <td>Ảnh</td>
                            <td><img src="{{ $category['avatar'] }}" width="100px"></td>
                        </tr>
                    </table>
                </div>
                <a href="/admin/categories" class="btn btn-secondary" style="color: white;"><-- Quay Lại Danh Sách</a>
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
    <title>Xem Chi Tiết Sản Phẩm: {{ $category['name'] }}</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Xem Chi Tiết Sản Phẩm: {{ $category['name'] }}</h1>

        <a href="/admin/categories" class="btn btn-info" style="font-weight: bold; color: white;"><-- Quay Lại Danh
                Sách</a>
                <div class="row">
                    <div class="col-5">
                        <table class="table">
                            <tr>
                                <th>Tên Trường</th>
                                <th>Giá Trị</th>

                            </tr>

                            <tr>
                                <td>ID</td>
                                <td>{{ $category['id'] }}</td>
                            </tr>

                            <tr>
                                <td>Tên</td>
                                <td>{{ $category['name'] }}</td>
                            </tr>

                            <tr>
                                <td>Ảnh</td>
                                <td><img src="{{ $category['avatar'] }}" width="100px"></td>
                            </tr>
                        </table>
                    </div>

                </div>
    </div>

</body>

</html> --}}
