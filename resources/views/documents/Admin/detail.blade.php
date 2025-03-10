@extends('layouts.admin')

@php
    // dd($document_detail)
@endphp

@section('title')
<h1>{{ $document_detail->tentailieu }}</h1>

@endsection
@section('main')
    <p>1</p>
    <p>1</p>
    <button class="btn btn-success" onclick="window.history.back()"><i class="bi bi-arrow-bar-left"></i>
        Trở về</button>
    <div class="document__detail" style="display: flex">
        <div class="document__image" style="width: 50%" >
            <img src="{{ $document_detail->hinhanh }}" class="img-thumbnail" alt="...">
        </div>
        <div class="document__content" style="width: 50%">
            <h4>{{ $document_detail->title }}</h4>
            <p>{{ $document_detail->noidung }}</p>
            <p>{{ $document_detail->created_at }}</p>
            <p>{{ $document_detail->updated_at }}</p>
        </div>
    </div>
    <div class="document__button">
        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reasonModal-{{ $document_detail->matailieu }}">
            Ẩn
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="reasonModal-{{ $document_detail->matailieu }}" tabindex="-1" aria-labelledby="reasonModalLabel-{{$document_detail->matailieu }}" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="reasonModalLabel-{{ $document_detail->matailieu }}">Nhập lý do</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="reasonForm-{{ $document_detail->matailieu }}" method="POST" action="{{ route('document.destroy', $document_detail->matailieu) }}">
                            @csrf
                            @method('DELETE')
                            <!-- Truyền tham số action để xác định hành động ẩn -->
                            <input type="hidden" name="action" value="hide">
                            <div class="mb-3">
                                <label for="reasonInput-{{ $document_detail->matailieu }}" class="form-label">Lý do</label>
                                <input class="form-control" id="reasonInput-{{ $document_detail->matailieu }}" name="reason" required>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng<i class="bi bi-x-octagon-fill"></i>
                        </button>
                        <button class="btn btn-primary" type="submit" form="reasonForm-{{ $document_detail->matailieu }}">Gửi</button>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModel-{{ $document_detail->matailieu }}">
            Xóa
        </button>
        
        <div class="modal fade" id="deleteModel-{{ $document_detail->matailieu }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $document_detail->matailieu }}" aria-hidden="true">
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
                        <form action="{{ route('document.destroy', $document_detail->matailieu) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <!-- Truyền tham số action để xác định hành động xóa cứng -->
                            <input type="hidden" name="action" value="delete">
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>                     
    </div>

@endsection
