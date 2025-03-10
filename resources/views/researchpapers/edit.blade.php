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
                    <label for="mota" class="form-label">Mô tả</label>
                    <input type="text" class="form-control" id="mota" name="mota" value="{{ $paper->mota }}" required>
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
                    <div class="mt-2">
                        @if ($paper->hinhanh && Storage::disk('public')->exists(str_replace('storage/', '', $paper->hinhanh)))
                            <img src="{{ asset($paper->hinhanh) }}" alt="Hình ảnh bài viết" class="img-fluid rounded" width="150">
                        @else
                            <img src="{{ asset('assets/images/icons/pdf_icon.jpg') }}" alt="PDF Icon" class="img-fluid rounded" width="150">
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                <a href="{{ route('researchpapers.index') }}" class="btn btn-secondary">Hủy</a>
            </form>
        </div>
    </div>

    <script>
        // Lấy ngày hôm nay
        const today = new Date();
        const formattedToday = today.toISOString().split('T')[0]; // Chuyển đổi sang định dạng yyyy-mm-dd

        // Gán giá trị mặc định cho trường ngày đăng nếu không có giá trị
        const ngayDangInput = document.getElementById('ngaydang');
        if (!ngayDangInput.value) {
            ngayDangInput.value = formattedToday;
        }
    </script>
@endsection