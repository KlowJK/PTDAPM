@extends('layouts.admin');
@php
//    dd($documents);
    $stt = 1;
 @endphp

@section('title')
    <div class="container-fluid">
        <div class="content">
            <h2>Trang xem quản lý tài liệu</h2>
        </div>
    </div>
   
    <a href="{{ route('admin.trash.index') }}">
        <button class="btn btn-secondary">Danh sách tin ẩn
            <i class="bi bi-eye-slash-fill"></i>

        </button>
    </a>
    <a href="{{ route('admin.accept.index') }}">
        <button class="btn btn-success">Duyệt
            <i class="bi bi-balloon-heart"></i>

        </button>
    </a>
@endsection
@section('main')

    <div class="document">
        <div class="container">
            <p>1</p>
            <p>1</p>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Mã tài liệu</th>
                        <th scope="col">Tên tài liệu </th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Tài liệu</th>
                        <th scope="col">Mô tả</th>
                        <th scope="col">Người đăng tải</th>
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($documents as $item)

                    <tr>
                        <td>{{$item->matailieu}}</td>
                        <td>{{$item->tentailieu}}</td>
                        <td><img style="width:100px; height:auto" src="{{$item->hinhanh}}"></td>
                        <td><a href="{{$item->path}}" download>
                                <img style="width: 50px" src="https://www.w3schools.com/images/myw3schoolsimage.jpg"></img>
                            </a></td>
                        <td style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis; max-width: 150px">{{$item->noidung}}</td>
                        <td>{{$item->user->TenTaiKhoan}}</td>
                        <td>@if ($item->TrangThai == 0)
                            <span class=" ant-tag-like ant-tag-like-green">Đã duyệt</span>
                        @else
                            
                        @endif</td>
                        <td>
                            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal-{{$item->matailieu}}">Xem<i class="bi bi-balloon-heart"></i>
                            </button>
                            <div class="modal fade" id="detailModal-{{$item->matailieu}}" tabindex="-1" aria-labelledby="detailModalLabel-{{$item->matailieu}}" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="detailModalLabel-{{$item->matailieu}}">Chi tiết tài liệu</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('admin.accept.update', $item->matailieu) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <p><strong>Mã tài liệu:</strong> {{$item->matailieu}}</p>
                                                        <p><strong>Tên tài liệu:</strong> {{$item->tentailieu}}</p>
                                                        <p><strong>Tài liệu:
                                                            <a href="{{ $item->path }}" download="{{ $item->path }}">
                                                                <img style="width: 50px" src="https://www.w3schools.com/images/myw3schoolsimage.jpg"></img>    
                                                            </a>    
                                                        </strong></p>
                                                        <p><strong>Người đăng:</strong> {{$item->user->TenTaiKhoan}}</p>
                                                        <p><strong>Ngày đăng:</strong> {{$item->created_at}}</p>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p><strong>Hình ảnh:</strong></p>
                                                        <img src="{{$item->hinhanh}}" style="width: 100%; height: auto;">
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-md-12">
                                                        <p><strong>Nội dung:</strong></p>
                                                        <p>{{$item->noidung}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng <i class="bi bi-x-octagon-fill"></i>
                                                </button>                                                
                                                <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reasonModal-{{ $item->matailieu }}">
                                                    Ẩn
                                                </button>                                           
                                             </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <!-- Nút Ẩn -->
                        <div class="modal fade" id="reasonModal-{{ $item->matailieu }}" tabindex="-1" aria-labelledby="reasonModalLabel-{{$item->matailieu }}" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reasonModalLabel-{{ $item->matailieu }}">Nhập lý do</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="reasonForm-{{ $item->matailieu }}" method="POST" action="{{ route('document.destroy', $item->matailieu) }}">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Truyền tham số action để xác định hành động ẩn -->
                                            <input type="hidden" name="action" value="hide">
                                            <div class="mb-3">
                                                <label for="reasonInput-{{ $item->matailieu }}" class="form-label">Lý do</label>
                                                <input class="form-control" id="reasonInput-{{ $item->matailieu }}" name="reason" required>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng<i class="bi bi-x-octagon-fill"></i>
                                        </button>
                                        <button class="btn btn-primary" type="submit" form="reasonForm-{{ $item->matailieu }}">Gửi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModel-{{ $item->matailieu }}">
                            Xóa
                            <i class="bi bi-archive-fill"></i>
                        </button>
                        
                        <div class="modal fade" id="deleteModel-{{ $item->matailieu }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $item->matailieu }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModelLabel">Bạn có muốn xóa tài liệu này???</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color: red;">Hãy suy nghĩ thật kỹ</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        <form action="{{ route('document.destroy', $item->matailieu) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <!-- Truyền tham số action để xác định hành động xóa cứng -->
                                            <input type="hidden" name="action" value="delete">
                                            <button type="submit" class="btn btn-danger">Xóa <i class="bi bi-archive-fill"></i>
                                            </button>
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
            {{ $documents->links() }}

        </div>
    </div>

    @if(session('message'))
    <div class="toast align-items-center show" id="toast" role="alert" aria-live="assertive" aria-atomic="true" style="position: fixed; top: 10px; right: 10px; z-index: 1050;">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('message') }}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        function openModal(matailieu) {
            // Lưu giá trị matailieu vào một biến toàn cục hoặc một thuộc tính data của modal
            $('#reasonModal').data('matailieu', matailieu);
            
            // Hiển thị modal
            $('#reasonModal').modal('show');
        }

        window.onload = function() {
        var toast = document.getElementById('toast');
        if (toast) {
            toast.classList.add('show');
            setTimeout(function() {
                toast.classList.remove('show');
            }, 3000); // 3 giây để ẩn toast
        }
    }
    </script>
    
@endsection


