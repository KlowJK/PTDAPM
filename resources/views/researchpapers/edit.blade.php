@extends('layouts.teacher')

@section('main')
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <i class="fas fa-edit fa-2x me-2"></i>
            <h2 class="mb-0">Chỉnh sửa bài viết</h2>
        </div>

        <div class="card shadow-sm p-4 mt-3">
            <form action="{{ route('researchpapers.update', $paper->mabaiviet) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="tenbaiviet" class="form-label">Tên bài viết</label>
                    <input type="text" class="form-control" id="tenbaiviet" name="tenbaiviet" value="{{ $paper->tenbaiviet }}" required>
                </div>

                <div class="mb-3">
                    <label for="nguoidang" class="form-label">Người đăng</label>
                    <input type="text" class="form-control" id="nguoidang" name="nguoidang" value="{{ $paper->nguoidang }}" required>
                </div>

                <div class="mb-3">
                    <label for="ngaydang" class="form-label">Ngày đăng</label>
                    <input type="date" class="form-control" id="ngaydang" name="ngaydang" value="{{ $paper->ngaydang }}" required>
                </div>

                <div class="mb-3">
                    <label for="noidung" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="noidung" name="noidung" rows="4" required>{{ $paper->noidung }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="hinhanh" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="hinhanh" name="hinhanh">
                    @if($paper->hinhanh)
                        <img src="{{ asset('storage/' . $paper->hinhanh) }}" alt="Hình ảnh bài viết" class="img-fluid rounded mt-2" width="150">
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                <a href="{{ route('researchpapers.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>
@endsection
