@extends('layouts.master')

@section('title')
    Danh Mục
@endsection

@section('dashboard')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Bảng Danh Mục</h1>
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
                                <th>Tên</th>
                                <th>Ảnh</th>
                                <th>Hành Động</th>
                            </tr>
                        </thead>

                        {{-- * Table Body --}}
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td> {{ $category['id'] }} </td>
                                    <td> {{ $category['name'] }} </td>
                                    <td> <img src="{{ $category['avatar'] }}" width="200px"> </td>
                                    <td style="text-align: center"><a class="btn btn-primary me-4"
                                            href="/admin/categories/show/{{ $category['id'] }}">Xem Chi
                                            Tiết</a>
                                        <a class="btn btn-warning"href="/admin/categories/update/{{ $category['id'] }}">Sửa</a>
                                        <a class="btn btn-danger" href="/admin/categories/delete/{{ $category['id'] }}"
                                            onclick="return confirm('Bạn có chắc là muốn xóa không?');">Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                        {{-- * Table Footer --}}
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Tên</th>
                                <th>Ảnh</th>
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


{{-- *Đặt Code "Template" đã làm mà chưa ghép giao diện vào đây để ghép các biến vào giao diện và xuất ra  --}}
{{-- *Ví Dụ: --}}
{{-- <body>

    <div class="container">
        <h1>Danh sách <span style="color: red; font-weight: bold">Sản Phẩm</span></h1>

        <div class="d-flex justify-content-between">
            <a href="/admin/categories/create" class="btn btn-success" style="font-weight: bold; color: white;">Thêm
                mới</a>
            <a href="/admin/users/" class="btn btn-primary" style="font-weight: bold; color: white;">Danh Sách Người
                Dùng</a>
            <a href="/admin/categories/" class="btn btn-primary" style="font-weight: bold; color: white;">Danh Sách
                Sản Phẩm</a>
            <a href="/admin/posts/" class="btn btn-primary" style="font-weight: bold; color: white;">Danh Sách Bài
                Viết</a>
        </div>

        <div class="row m-0 p-0">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Tên</th>
                    <th>Ảnh</th>
                    <th colspan="3" style="text-align: center">Hành Động</th>
                </tr>

                @foreach ($categories as $category)
                    <tr>
                        <td> {{ $category['id'] }} </td>
                        <td> {{ $category['name'] }} </td>
                        <td> <img src="{{ $category['avatar'] }}" width="100px"> </td>
                        <td style="text-align: center"><a class="btn btn-primary me-4"
                                href="/admin/categories/show/{{ $category['id'] }}">Xem Chi Tiết</a>
                            <a class="btn btn-warning" href="/admin/categories/update/{{ $category['id'] }}">Sửa</a>
                            <a class="btn btn-danger" href="/admin/categories/delete/{{ $category['id'] }}"
                                onclick="return confirm('Bạn có chắc là muốn xóa không?');">Xóa</a>
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>

</body> --}}
