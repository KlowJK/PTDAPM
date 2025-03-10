@extends('layouts.admin')
@php
    // dd($trashDocument)   
@endphp

@section('title')
    <h3>Trang duyệt duyệt tin tức</h3>
        <button class="btn btn-success" onclick="window.history.back()"><i class="bi bi-arrow-bar-left"></i>
            Trở về</button>
@endsection

@section('main')
<div class="trash">
    <div class="container">
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
            @foreach($accept as $item)

                <tr>
                    <td>{{$item->matailieu}}</td>
                    <td>{{$item->tentailieu}}</td>
                    <td><img style="width:100px; height:auto" src="{{$item->hinhanh}}"></td>
                    <td><a href="{{$item->path}} download">
                            <img style="width: 50px" src="https://www.w3schools.com/images/myw3schoolsimage.jpg"></img>
                        </a></td>
                    <td style="white-space: nowrap; overflow: hidden;text-overflow: ellipsis; max-width: 150px">{{$item->noidung}}</td>
                    <td>{{$item->user->TenTaiKhoan}}</td>
                    <td>@if ($item->TrangThai == 2)
                        <span class="ant-tag-like ant-tag-like-yellow">Đang chờ</span>
                    @endif</td>
                    <td>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#detailModal-{{$item->matailieu}}">Duyệt<i class="bi bi-balloon-heart"></i>
                        </button>
                    </td>
                </tr>
            
                <!-- Modal -->
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
                                    <button type="submit" class="btn btn-success">Duyệt <i class="bi bi-balloon-heart"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $accept->links() }}
@endsection