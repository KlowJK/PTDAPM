@extends('layouts.admin')
@section('title', 'Quản lý tài khoản')

@section('main')
<div class="container-fluid ">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card">
                <div class="card-body">
                    <div class="card-body">
                        <div class="d-flex align-items-center gap-2 mb-4">
                            <span>
                                <i class="bi bi-cart check-fill fs-6"></i>
                            </span>
                            <h3 class="mb-0">Danh sách tài khoản</h3>
                        </div>
                        <small>Cập nhật lần cuối </small>
                        <!-- Nút Thêm sản phẩm, căn phải -->

                        <a href="{{ route('users.create') }}" class="btn btn-primary mb-2 ms-auto d-block" style="width: max-content;">
                            <i class="bi bi-cart-plus"></i> Thêm
                        </a>

                    </div>
                    @if (session('success'))
                    <div class="container">
                        <div class="alert alert-success  alert-dismissible" role="alert">
                            {{ session('success') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="container">
                        <div class="alert alert-danger  alert-dismissible" role="alert">
                            {{ session('error') }}
                            <button class="btn-close" aria-label="close" data-bs-dismiss="alert"></button>
                        </div>
                    </div>
                    @endif
                    <!-- Thêm lớp ms-auto để đẩy nút sang bên phải -->
                    <div class="ibox-content">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-nowrap">STT</th>
                                    <th scope="col" class="text-nowrap">Tên </th>
                                    <th scope="col" class="text-nowrap">Trạng </th>
                                    <th scope="col" class="text-nowrap">Ngày đặt hàng</th>
                                    <th scope="col" colspan="4" class="text-nowrap text-center">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $user->tentaikhoan }}</td>

                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">
                                            <i class="bi bi-receipt"></i>
                                        </a>
                                    </td>
                                    <td> <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary"><i class="bi bi-pencil-square"></i></a>
                                    </td>
                                    <td> <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $user->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button></td>
                                    <td> <a href="{{ route('users.history', $user->customer_id) }}" class="btn btn-primary">
                                            <i class="bi bi-clock-history"></i>
                                        </a></td>


                                    <!-- Modal -->
                                    <div class="modal fade " id="modal-{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa đơn hàng</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có muốn xóa đơn hàng này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="{{route('users.destroy',$user->id)}}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xác nhận</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>


@endsection