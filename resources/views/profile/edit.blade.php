<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>

</x-app-layout>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SeoDash Free Bootstrap Admin Template by Adminmart</title>
    <link rel="shortcut icon" type="image/png" href="{{ url('assets/images/logos/seodashlogo.png') }}" />
    <link rel="stylesheet" href="../../node_modules/simplebar/dist/simplebar.min.css">
    <link rel="stylesheet" href="{{url('assets/css/styles.min.css')}}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <!--  Main wrapper -->
        <div class="body-wrapper">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title fw-semibold mb-4">Thông tin cá nhân</h5>
                        <div class="card">
                            <div class="card-body">
                                <!-- Form cho tất cả vai trò -->
                                <form method="post" action="{{ route('profile.update') }}">
                                    @csrf
                                    @method('patch')

                                    <!-- Trường chung cho tất cả -->
                                    <div class="mb-3">
                                        <label for="tentaikhoan" class="form-label">Tên tài khoản</label>
                                        <input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan" value="{{ old('tentaikhoan', $user->tentaikhoan) }}" required>
                                        <div class="form-text text-danger">{{ $errors->first('tentaikhoan') }}</div>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                        <div class="form-text text-danger">{{ $errors->first('email') }}</div>
                                        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                        <div class="form-text">
                                            Địa chỉ email của bạn chưa được xác minh.
                                            <button type="submit" form="send-verification" class="btn btn-link p-0 text-decoration-underline">Gửi lại email xác minh</button>
                                        </div>
                                        @if (session('status') === 'verification-link-sent')
                                        <div class="form-text text-success">Liên kết xác minh mới đã được gửi đến email của bạn.</div>
                                        @endif
                                        @endif
                                    </div>

                                    <!-- Trường cho admin -->
                                    @if ($user->vaitro === 'admin')
                                    <div class="mb-3">
                                        <label for="maquantri" class="form-label">Mã quản trị</label>
                                        <input type="text" class="form-control" id="maquantri" name="maquantri" value="{{ old('maquantri', $user->admin->maquantri) }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tenquantri" class="form-label">Tên quản trị</label>
                                        <input type="text" class="form-control" id="tenquantri" name="tenquantri" value="{{ old('tenquantri', $user->admin->tenquantri) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="ngaysinh" class="form-label">Ngày sinh</label>
                                        <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh', $user->admin->ngaysinh) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gioitinh" class="form-label">Giới tính</label>
                                        <select class="form-select" id="gioitinh" name="gioitinh">
                                            <option value="Nam" {{ $user->admin->gioitinh === 'Nam' ? 'selected' : '' }}>Nam</option>
                                            <option value="Nữ" {{ $user->admin->gioitinh === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quequan" class="form-label">Quê quán</label>
                                        <input type="text" class="form-control" id="quequan" name="quequan" value="{{ old('quequan', $user->admin->quequan) }}">
                                    </div>
                                    @endif

                                    <!-- Trường cho sinh viên -->
                                    @if ($user->vaitro === 'student')
                                    <div class="mb-3">
                                        <label for="masinhvien" class="form-label">Mã sinh viên</label>
                                        <input type="text" class="form-control" id="masinhvien" name="masinhvien" value="{{ old('masinhvien', $user->student->masinhvien) }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tensinhvien" class="form-label">Tên sinh viên</label>
                                        <input type="text" class="form-control" id="tensinhvien" name="tensinhvien" value="{{ old('tensinhvien', $user->student->tensinhvien) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="khoa" class="form-label">Khoa</label>
                                        <input type="text" class="form-control" id="khoa" name="khoa" value="{{ old('khoa', $user->student->khoa) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="lop" class="form-label">Lớp</label>
                                        <input type="text" class="form-control" id="lop" name="lop" value="{{ old('lop', $user->student->lop) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ngaysinh" class="form-label">Ngày sinh</label>
                                        <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh', $user->student->ngaysinh) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gioitinh" class="form-label">Giới tính</label>
                                        <select class="form-select" id="gioitinh" name="gioitinh">
                                            <option value="Nam" {{ $user->student->gioitinh === 'Nam' ? 'selected' : '' }}>Nam</option>
                                            <option value="Nữ" {{ $user->student->gioitinh === 'Nữ' ? 'selected' : '' }}>Nữ</option>

                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quequan" class="form-label">Quê quán</label>
                                        <input type="text" class="form-control" id="quequan" name="quequan" value="{{ old('quequan', $user->student->quequan) }}">
                                    </div>
                                    @endif

                                    <!-- Trường cho giảng viên -->
                                    @if ($user->vaitro === 'teacher')
                                    <div class="mb-3">
                                        <label for="magiaovien" class="form-label">Mã giảng viên</label>
                                        <input type="text" class="form-control" id="magiaovien" name="magiaovien" value="{{ old('magiaovien', $user->teacher->magiaovien) }}" readonly>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tengiaovien" class="form-label">Tên giảng viên</label>
                                        <input type="text" class="form-control" id="tengiaovien" name="tengiaovien" value="{{ old('tengiaovien', $user->teacher->tengiaovien) }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="khoa" class="form-label">Khoa</label>
                                        <input type="text" class="form-control" id="khoa" name="khoa" value="{{ old('khoa', $user->teacher->khoa) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="ngaysinh" class="form-label">Ngày sinh</label>
                                        <input type="text" class="form-control" id="ngaysinh" name="ngaysinh" value="{{ old('ngaysinh', $user->teacher->ngaysinh) }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="gioitinh" class="form-label">Giới tính</label>
                                        <select class="form-select" id="gioitinh" name="gioitinh">
                                            <option value="Nam" {{ $user->teacher->gioitinh === 'Nam' ? 'selected' : '' }}>Nam</option>
                                            <option value="Nữ" {{ $user->teacher->gioitinh === 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="quequan" class="form-label">Quê quán</label>
                                        <input type="text" class="form-control" id="quequan" name="quequan" value="{{ old('quequan', $user->teacher->quequan) }}">
                                    </div>
                                    @endif

                                    <!-- Nút submit -->
                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                    @if (session('status') === 'profile-updated')
                                    <span class="form-text text-success">Đã lưu.</span>
                                    @endif
                                </form>

                                <!-- Form gửi lại email xác minh -->
                                <form id="send-verification" method="post" action="{{ route('verification.send') }}" hidden>
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{url('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{url('assets/js/app.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>



</body>

</html>