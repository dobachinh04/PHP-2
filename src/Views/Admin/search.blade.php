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