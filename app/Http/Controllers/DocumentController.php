<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Http\Requests\StoreDocumentRequest;
use App\Http\Requests\UpdateDocumentRequest;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $documents = Document::with('user')->where('TrangThai', 0)
        ->orderBy('created_at', 'desc')
        ->paginate(10);        
        return view('documents.admin.index', compact('documents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDocumentRequest $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Document $document)
    {
        $document_detail = $document;
        return view('documents.Admin.detail', compact('document_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDocumentRequest $request, Document $document)
    {
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        if ($request->action === 'hide') {
            $document->delete();

            // Nếu bạn muốn lưu lại lý do ẩn, có thể cập nhật thêm vào một cột như 'reason'
            $document->reason = $request->reason;
            $document->save();

            return redirect()->route('document.index')->with('message', 'Tài liệu đã được ẩn (xóa mềm).');
        }
        elseif ($request->action === 'delete') {
            $document->forceDelete();
            return redirect()->route('document.index')->with('message', 'Tài liệu đã được xóa hoàn toàn (xóa cứng).');
        }

        return redirect()->route('document.index')->with('error', 'Hành động không xác định.');
    }

}
