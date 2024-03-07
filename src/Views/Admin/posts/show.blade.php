@extends('layouts.master')

@section('title')
    Xem Chi Tiết: {{ $post['p_title'] }}
@endsection

@section('dashboard')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Xem Chi Tiết: {{ $post['p_title'] }}</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                            For more information about DataTables, please visit the <a target="_blank"
                                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
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
                            <td>{{ $post['p_id'] }}</td>
                        </tr>

                        <tr>
                            <td>Mã Danh Mục</td>
                            <td>{{ $post['c_id'] }} - {{ $post['c_name'] }}</td>
                        </tr>

                        <tr>
                            <td>Tiêu Đề Bài Đăng</td>
                            <td>{{ $post['p_title'] }}</td>
                        </tr>

                        <tr>
                            <td>Mô tả ngắn</td>
                            <td>{{ $post['p_excerpt'] }}</td>
                        </tr>

                        <tr>
                            <td>Nội dung</td>
                            <td>{{ $post['p_content'] }}</td>
                        </tr>
                        <tr>
                            <td>Ảnh</td>
                            <td><img src="{{ $post['p_image'] }}" width="100px"></td>
                        </tr>

                        <tr>
                            <td>Lượt Xem</td>
                            <td>{{ $post['p_view'] }}</td>
                        </tr>

                    </table>
                </div>
                <a href="/admin/posts" class="btn btn-secondary" style="color: white;"><-- Quay Lại Danh Sách</a>
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
    <title>Xem Chi Tiết Sản Phẩm: {{ $post['name'] }}</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Xem Chi Tiết Bài Viết: {{ $post['title'] }}</h1>

        <a href="/admin/posts" class="btn btn-info" style="font-weight: bold; color: white;"><-- Quay Lại Danh Sách</a>
                <div class="row">
                    <div class="col-5">
                        <table class="table">
                            <tr>
                                <th>Tên Trường</th>
                                <th>Giá Trị</th>

                            </tr>

                            <tr>
                                <td>ID</td>
                                <td>{{ $post['p_id'] }}</td>
                            </tr>

                            <tr>
                                <td>Mã Sản Phẩm</td>
                                <td>{{ $post['c_id'] }} - {{ $post['c_name'] }}</td>
                            </tr>

                            <tr>
                                <td>Tiêu Đề Bài Đăng</td>
                                <td>{{ $post['p_title'] }}</td>
                            </tr>

                            <tr>
                                <td>Mô tả ngắn</td>
                                <td>{{ $post['p_excerpt'] }}</td>
                            </tr>

                            <tr>
                                <td>Nội dung</td>
                                <td>{{ $post['p_content'] }}</td>
                            </tr>
                            <tr>
                                <td>Ảnh</td>
                                <td><img src="{{ $post['p_image'] }}" width="100px"></td>
                            </tr>
                        </table>
                    </div>

                </div>
    </div>

</body>

</html> --}}
