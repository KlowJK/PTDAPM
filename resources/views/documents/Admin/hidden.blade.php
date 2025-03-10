<!-- Modal -->
<button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#reasonModal-{{ $item->matailieu }}">
    Ẩn
</button>
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
                <button class="btn btn-primary" type="submit" form="reasonForm-{{ $document_detail->matailieu }}">Gửi</button>
            </div>
        </div>
    </div>
</div>
