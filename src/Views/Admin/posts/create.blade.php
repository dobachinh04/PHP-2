@extends('layouts.master')

@section('title')
    Thêm Bài Viết
@endsection

@section('dashboard')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thêm Mới Bài Viết</h1>
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
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Mã Sản Phẩm:</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="" selected disabled>Chọn Mã Sản Phẩm</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}"> {{ $category['name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Tiêu Đề Bài Đăng:</label>
                            <input type="text" class="form-control" id="title" required placeholder="Nhập Tiêu Đề"
                                name="title">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="excerpt" class="form-label">Mô tả ngắn:</label>
                            <input type="text" class="form-control" id="excerpt" required placeholder="Nhập Mô tả ngắn"
                                name="excerpt">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Nội dung:</label>
                            <input type="text" class="form-control" id="content" required placeholder="Nhập Nội dung"
                                name="content">
                        </div>

                        <div class="mb-5">
                            <label for="image" class="form-label">Ảnh:</label> <br>
                            <input type="file" id="image" name="image">
                        </div>
                        <a href="/admin/posts" class="btn btn-secondary" style="color: white;"><-- Quay Lại Danh Sách</a>
                                <button type="submit" class="btn btn-primary">Thêm Mới</button>
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
    <title>Thêm mới Bài Đăng</title>

    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container">
        <h1>Thêm mới Bài Viết</h1>

        <a href="/admin/posts" class="btn btn-info" style="font-weight: bold; color: white;"><-- Quay Lại Danh Sách</a>

                <div class="row">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 mt-3">
                            <label for="category_id" class="form-label">Mã Sản Phẩm:</label>
                            <select class="form-select" id="category_id" name="category_id">
                                <option value="" selected disabled>Chọn Mã Sản Phẩm</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category['id'] }}"> {{ $category['name'] }} </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="title" class="form-label">Tiêu Đề Bài Đăng:</label>
                            <input type="text" class="form-control" id="title" required
                                placeholder="Nhập Tiêu Đề" name="title">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="excerpt" class="form-label">Mô tả ngắn:</label>
                            <input type="text" class="form-control" id="excerpt" required
                                placeholder="Nhập Mô tả ngắn" name="excerpt">
                        </div>
                        <div class="mb-3 mt-3">
                            <label for="content" class="form-label">Nội dung:</label>
                            <input type="text" class="form-control" id="content" required
                                placeholder="Nhập Nội dung" name="content">
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Ảnh:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Thêm Mới</button>
                    </form>
                </div>
    </div>

</body>

</html> --}}
