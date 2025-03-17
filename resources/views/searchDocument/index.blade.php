@extends('layouts.search')
@php
// dd($documents)
@endphp
@section('main')
<p>
    Chúng tôi hy vọng rằng trang xem tài liệu này sẽ trở thành một công cụ hữu ích,
    giúp bạn tiết kiệm thời gian và nâng cao hiệu quả công việc.

</p>
<p>
    Chúng tôi luôn nỗ lực cải thiện và phát triển trang web để mang đến cho bạn những trải nghiệm tốt nhất.
</p>
<p>
    Nếu bạn có bất kỳ câu hỏi hoặc góp ý nào, đừng ngần ngại liên hệ với chúng tôi. Chúng tôi luôn sẵn lòng lắng nghe và hỗ trợ bạn.
</p>

@endsection
@section('content')
<div class="document-search__header" style="display: flex; justify-content:space-between">
    <h2 class="display-6">Danh sách các tài liệu</h2>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="d-flex" action="{{ route('searchsearchdocument.search') }}" method="GET">
                    @method('GET')
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm tài liệu" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="document--search">
    <div class="card-main" style="display:flex; flex-wrap:wrap">

        @foreach ($documents as $item)
        <div class="card" style="width: 30%; margin-right: 20px; margin-bottom:20px;">
            <div class="card-header">
                <a class="title" style="display:flex; justify-content:space-between; text-decoration:none" href="{{ route('searchsearchdocument.show', $item->matailieu) }}">
                    <p>{{ $item->tentailieu }}</p>
                    <i>{{ $item->user->tentaikhoan }}</i>
                </a>
            </div>
            <div class="card-body">
                <div class="content">
                    <p>{{ $item->noidung }}</p>
                </div>
            </div>
            <div class="card-footer">
                <p>{{ $item->ngaydang }}</p>
            </div>
        </div>
        @endforeach
    </div>

</div>
{{ $documents->links() }}
@endsection


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

<script>
    // Hiển thị toast nếu có
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