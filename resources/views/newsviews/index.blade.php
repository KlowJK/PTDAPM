@extends('layouts.newsviews')

@section('main')
<div class="container">
    <h2 class="mb-4">Danh sách Tin Tức</h2>

    <ul class="list-unstyled">
        @foreach($news as $item)
        @php
        $avatarIndex = $loop->index % 6 + 1;
        $avatarUrl = "https://bootdey.com/img/Content/avatar/avatar{$avatarIndex}.png";
        @endphp
        <li class="media my-4 p-3 border rounded">
            <img class="d-flex mr-3 img-fluid rounded-circle" width="64" src="{{ $avatarUrl }}" alt="News Image">
            <div class="media-body">
                <h5 class="mt-0 mb-1">
                    <a href="#" class="news-item text-decoration-none text-dark"
                        data-news-id="{{ $item->matintuc }}"
                        data-title="{{ $item->tentintuc }}"
                        data-summary="{{ $item->tomtat }}"
                        data-date="{{ $item->ngaydang }}"
                        data-avatar="{{ $avatarUrl }}">
                        {{ $item->tentintuc }}
                    </a>
                </h5>
                <p class="text-muted">{{ $item->tomtat }}</p>
                <p class="text-muted">Phản hồi: {{ $item->feedbacks->count() }}</p>
                <small class="text-primary">Ngày đăng: {{ $item->ngaydang }}</small>
            </div>
        </li>
        @endforeach
    </ul>
    <div class="d-flex justify-content-center">
        {!! $news->links('pagination::bootstrap-4') !!}
    </div>

</div>
@endsection

@section('content')
<div id="news-detail" class="container p-3 mt-3 border rounded bg-light">
    <p>Chọn một tin tức để xem chi tiết.</p>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        let newsItems = document.querySelectorAll('.news-item');
        let detailContainer = document.getElementById('news-detail');

        newsItems.forEach(item => {
            item.addEventListener('click', async function(event) {
                event.preventDefault();
                let title = this.getAttribute('data-title');
                let summary = this.getAttribute('data-summary');
                let date = this.getAttribute('data-date');
                let avatar = this.getAttribute('data-avatar');
                let newsId = this.getAttribute('data-news-id');

                // Lấy danh sách phản hồi từ API
                let feedbackHtml = '';
                try {
                    let response = await fetch(`/api/feedbacks/${newsId}`);
                    let feedbacks = await response.json();
                    feedbacks.forEach(fb => {
                        feedbackHtml += `
                            <li class="list-group-item">
                                <strong>${fb.nguoigui}</strong>: ${fb.noidung}
                                <br><small class="text-muted">${fb.ngaythacmac}</small>
                            </li>
                        `;
                    });
                } catch (error) {
                    console.error("Lỗi khi tải phản hồi:", error);
                    feedbackHtml = '<li class="list-group-item text-muted">Không có phản hồi.</li>';
                }

                detailContainer.innerHTML = `
                    <div class="media p-3 border rounded bg-white">
                        <img class="d-flex mr-3 img-fluid rounded-circle" width="64" src="${avatar}" alt="News Image">
                        <div class="media-body">
                            <h5 class="mt-0 mb-1">${title}</h5>
                            <p>${summary}</p>
                            <small class="text-primary">Ngày đăng: ${date}</small>
                        </div>
                    </div>
                    <h5 class="mt-3">Phản hồi</h5>
                    <ul class="list-group">
                        ${feedbackHtml}
                    </ul>
                `;
            });
        });
    });
</script>
@endsection