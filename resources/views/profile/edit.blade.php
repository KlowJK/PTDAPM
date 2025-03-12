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
        </div>
    </div>
</x-app-layout>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hồ Sơ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{url('assets/css/styles.min.css')}}" />
</head>

<body>
    <main id="main" class="main">
        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if($user->vaitro == 'admin')
                            <img src="{{ asset('storage/' . $user->admin->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                            @elseif($user->vaitro == 'student')
                            <img src="{{ asset('storage/' . $user->student->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                            @elseif($user->vaitro == 'teacher')
                            <img src="{{ asset('storage/' . $user->teacher->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                            @endif
                            <h2>{{$user->tentaikhoan}}</h2>
                            <h5>{{$user->vaitro}}</h5>
                            <div class="social-links mt-2">
                                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Tab viền -->
                            <ul class="nav nav-tabs nav-tabs-bordered">

                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Tổng quan</button>
                                </li>

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Chỉnh sửa hồ sơ</button>
                                </li>

                                <!-- <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-settings">Cài đặt</button>
                            </li> -->

                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Đổi mật khẩu</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                    <h5 class="card-title mt-3">Giới thiệu</h5>
                                    <p class="small fst-italic mb-3">{{$user->gioithieu}}</p>

                                    <h5 class="card-title mb-4">Chi tiết hồ sơ</h5>
                                    @if($user->vaitro == 'admin')
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Mã quản trị</div>
                                        <div class="col-lg-9 col-md-8">{{$user->admin->maquantri}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Họ và tên</div>
                                        <div class="col-lg-9 col-md-8">{{$user->admin->tenquantri}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Ngày sinh</div>
                                        <div class="col-lg-9 col-md-8">{{$user->admin->ngaysinh}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Giới tính</div>
                                        <div class="col-lg-9 col-md-8">{{$user->admin->gioitinh}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Địa chỉ</div>
                                        <div class="col-lg-9 col-md-8">{{$user->admin->quequan}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Trạng thái</div>
                                        <div class="col-lg-9 col-md-8">
                                            @if($user->trangthai == 'active')
                                            <strong class="text">Hoạt động</strong>
                                            @else
                                            <span class="badge bg-danger">Khóa</span>
                                            @endif
                                        </div>
                                    </div>
                                    @elseif($user->vaitro == 'student')
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Mã sinh viên</div>
                                        <div class="col-lg-9 col-md-8">{{$user->student->masinhvien}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Họ và tên</div>
                                        <div class="col-lg-9 col-md-8">{{$user->student->tensinhvien}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Ngày sinh</div>
                                        <div class="col-lg-9 col-md-8">{{$user->student->ngaysinh}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Giới tính</div>
                                        <div class="col-lg-9 col-md-8">{{$user->student->gioitinh}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Địa chỉ</div>
                                        <div class="col-lg-9 col-md-8">{{$user->student->quequan}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Khoa</div>
                                        <div class="col-lg-9 col-md-8">{{$user->student->khoa}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Lớp</div>
                                        <div class="col-lg-9 col-md-8">{{$user->student->lop}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                    </div>
                                    @elseif($user->vaitro == 'teacher')
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Mã giảng viên</div>
                                        <div class="col-lg-9 col-md-8">{{$user->teacher->magiaovien}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Họ và tên</div>
                                        <div class="col-lg-9 col-md-8">{{$user->teacher->tengiaovien}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Ngày sinh</div>
                                        <div class="col-lg-9 col-md-8">{{$user->teacher->ngaysinh}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Giới tính</div>
                                        <div class="col-lg-9 col-md-8">{{$user->teacher->gioitinh}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Địa chỉ</div>
                                        <div class="col-lg-9 col-md-8">{{$user->teacher->quequan}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Khoa</div>
                                        <div class="col-lg-9 col-md-8">{{$user->teacher->khoa}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{$user->email}}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 mb-2 label">Trạng thái</div>
                                        <div class="col-lg-9 col-md-8">
                                            @if($user->trangthai == 'active')
                                            <strong class="text">Hoạt động</strong>
                                            @else
                                            <span class="badge bg-danger">Khóa</span>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
                                </div>

                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Form chỉnh sửa hồ sơ -->
                                    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('patch')
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Ảnh hồ sơ</label>
                                            <div class="col-md-8 col-lg-9">@if($user->vaitro == 'admin')
                                                <img src="{{ asset('storage/' . $user->admin->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                                                @elseif($user->vaitro == 'student')
                                                <img src="{{ asset('storage/' . $user->student->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                                                @elseif($user->vaitro == 'teacher')
                                                <img src="{{ asset('storage/' . $user->teacher->hinhanh) }}" alt="Hồ sơ" class="rounded-circle">
                                                @endif
                                                <div class="pt-2">
                                                    <a href="#" class="btn btn-primary btn-sm" title="Tải lên ảnh hồ sơ mới"><i class="bi bi-upload"></i></a>
                                                    <a href="#" class="btn btn-danger btn-sm" title="Xóa ảnh hồ sơ của tôi"><i class="bi bi-trash"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        @if($user->vaitro == 'admin')
                                        <div class="row mb-3">
                                            <label for="adminCode" class="col-md-4 col-lg-3 col-form-label">Mã quản trị {{$user->admin->maquantri}}</label>
                                            <div class="col-md-8 col-lg-9">
                                                <label for="adminCode" class="col-md-4 col-lg-3 col-form-label">{{$user->admin->maquantri}}</label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <label for="email" class="col-md-4 col-lg-3 col-form-label">{{$user->email}}</label>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Họ và tên</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="fullName" type="text" class="form-control" id="fullName" value="{{$user->admin->tenquantri}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Giới thiệu</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px">{{$user->gioithieu}}</textarea>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="ngaysinh" class="col-md-4 col-lg-3 col-form-label">Ngày sinh</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="ngaysinh" type="date" class="form-control" id="ngaysinh" value="{{$user->admin->ngaysinh}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="gioitinh" class="col-md-4 col-lg-3 col-form-label">Giới tính</label>
                                            <div class="col-md-8 col-lg-9">
                                                <select name="gioitinh" class="form-control" id="gioitinh">
                                                    <option value="male" {{ $user->admin->gioitinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                                                    <option value="female" {{ $user->admin->gioitinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="quequan" class="col-md-4 col-lg-3 col-form-label">Quê quán</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="quequan" type="text" class="form-control" id="quequan" value="{{$user->admin->quequan}}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Địa chỉ</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address" value="A108 Adam Street, New York, NY 535022">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Số điện thoại</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone" value="(436) 486-3538 x29071">
                                            </div>
                                        </div>


                                        @endif


                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                        </div>
                                    </form><!-- Kết thúc Form chỉnh sửa hồ sơ -->

                                </div>

                                <!-- <div class="tab-pane fade pt-3" id="profile-settings">

                                <form>
                                    <div class="row mb-3">
                                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Thông báo email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="changesMade" checked>
                                                <label class="form-check-label" for="changesMade">
                                                    Thay đổi được thực hiện trên tài khoản của bạn
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="newProducts" checked>
                                                <label class="form-check-label" for="newProducts">
                                                    Thông tin về sản phẩm và dịch vụ mới
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="proOffers">
                                                <label class="form-check-label" for="proOffers">
                                                    Ưu đãi tiếp thị và khuyến mãi
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="securityNotify" checked disabled>
                                                <label class="form-check-label" for="securityNotify">
                                                    Cảnh báo bảo mật
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                    </div>
                                </form>

                            </div> -->

                                <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Form đổi mật khẩu -->
                                    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
                                        @csrf
                                        @method('put')



                                        <div class="row mb-3">
                                            <label for="update_password_current_password" class="col-md-4 col-lg-3 col-form-label">Mật khẩu hiện tại</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control" id="update_password_current_password">
                                            </div>
                                            @if ($errors->updatePassword->has('current_password'))
                                            <span class="error-message text-danger small mt-1 fst-italic">{{ $errors->updatePassword->first('current_password') }}</span>
                                            @endif
                                        </div>


                                        <div class="row mb-3">
                                            <label for="update_password_password" class="col-md-4 col-lg-3 col-form-label">Mật khẩu mới</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control" id="update_password_password" autocomplete="new-password">
                                            </div>
                                            @if ($errors->updatePassword->has('password'))
                                            <span class="error-message text-danger small mt-1 fst-italic">{{ $errors->updatePassword->first('password') }}</span>
                                            @endif
                                        </div>


                                        <div class="row mb-3">
                                            <label for="update_password_password_confirmation" class="col-md-4 col-lg-3 col-form-label">Nhập lại mật khẩu mới</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" type="password" class="form-control" id="update_password_password_confirmation" autocomplete="new-password">
                                            </div>
                                            @if ($errors->updatePassword->has('password_confirmation'))
                                            <span class="error-message text-danger small mt-1 fst-italic">{{ $errors->updatePassword->first('password_confirmation') }}</span>
                                            @endif
                                        </div>

                                        @if (session('status') === 'password-updated')
                                        <div class="row mb-3">
                                            <div class="col-md-8 offset-md-4 col-lg-9 offset-lg-3">
                                                <span class="text-success small fst-italic">Mật khẩu đã được cập nhật.</span>
                                            </div>
                                        </div>
                                        @endif

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                                        </div>
                                    </form><!-- Kết thúc Form đổi mật khẩu -->

                                </div>
                            </div><!-- Kết thúc Tab viền -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- Kết thúc #main -->

    <script src="{{url('assets/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{url('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{url('assets/libs/simplebar/dist/simplebar.js')}}"></script>
    <script src="{{url('assets/js/sidebarmenu.js')}}"></script>
    <script src="{{url('assets/js/app.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>