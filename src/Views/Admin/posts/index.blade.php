@extends('layouts.master')

@section('title')
    Bài Viết
@endsection

@section('dashboard')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Bảng Bài Viết</h1>
        {{-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                            For more information about DataTables, please visit the <a target="_blank"
                                href="https://datatables.net">official DataTables documentation</a>.</p> --}}

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            {{-- <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                            </div> --}}
            <div class="card-body">
                <div class="table-responsive">

                    {{-- * Datatables --}}
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                        {{-- * Table Head --}}
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Mã Danh Mục</th>
                                <th>Tiêu Đề Bài Viết</th>
                                <th>Mô tả ngắn</th>
                                <th>Ảnh</th>
                                <th>Lượt Xem</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>

                        {{-- * Table Body --}}
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td> {{ $post['p_id'] }} </td>
                                    <td> {{ $post['c_id'] }} - {{ $post['c_name'] }} </td>
                                    <td> {{ $post['p_title'] }} </td>
                                    <td> {{ $post['p_excerpt'] }} </td>
                                    <td> <img src="{{ $post['p_image'] }}" width="100px"> </td>
                                    <td> {{ $post['p_view'] }} </td>
                                    <td style="text-align: center"><a class="btn btn-primary me-4"
                                            href="/admin/posts/show/{{ $post['p_id'] }}">Xem Chi Tiết</a>
                                        <a class="btn btn-warning" href="/admin/posts/update/{{ $post['p_id'] }}">Sửa</a>
                                        <a class="btn btn-danger" href="/admin/posts/delete/{{ $post['p_id'] }}"
                                            onclick="return confirm('Bạn có chắc là muốn xóa không?');">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- * Table Footer --}}
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Mã Danh Mục</th>
                                <th>Tiêu Đề Bài Viết</th>
                                <th>Mô tả ngắn</th>
                                <th>Ảnh</th>
                                <th>Lượt Xem</th>
                                <th>Hành Động</th>
                            </tr>
                        </tfoot>
                    </table>
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
    <title>Danh sách Bài Viết</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Danh sách <span style="color: red; font-weight: bold">Bài Viết</span></h1>

        <div class="d-flex justify-content-between">
            <a href="/admin/posts/create" class="btn btn-success" style="font-weight: bold; color: white;">Thêm mới</a>
            <a href="/admin/users/" class="btn btn-primary" style="font-weight: bold; color: white;">Danh Sách Người
                Dùng</a>
            <a href="/admin/categories/" class="btn btn-primary" style="font-weight: bold; color: white;">Danh Sách Sản
                Phẩm</a>
            <a href="/admin/posts/" class="btn btn-primary" style="font-weight: bold; color: white;">Danh Sách Bài
                Viết</a>
        </div>

        <div class="row m-0 p-0">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Mã Sản Phẩm</th>
                    <th>Tiêu Đề Bài Viết</th>
                    <th>Mô tả ngắn</th>
                    <th>Ảnh</th>
                    <th colspan="3" style="text-align: center">Hành Động</th>
                </tr>

                @foreach ($posts as $post)
                    <tr>
                        <td> {{ $post['p_id'] }} </td>
                        <td> {{ $post['c_id'] }} - {{ $post['c_name'] }} </td>
                        <td> {{ $post['p_title'] }} </td>
                        <td> {{ $post['p_excerpt'] }} </td>
                        <td> <img src="{{ $post['p_image'] }}" width="100px"> </td>
                        <td style="text-align: center"><a class="btn btn-primary me-4"
                                href="/admin/posts/show/{{ $post['p_id'] }}">Xem Chi Tiết</a>
                            <a class="btn btn-warning" href="/admin/posts/update/{{ $post['p_id'] }}">Sửa</a>
                            <a class="btn btn-danger" href="/admin/posts/delete/{{ $post['p_id'] }}"
                                onclick="return confirm('Bạn có chắc là muốn xóa không?');">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

</body>

</html> --}}
