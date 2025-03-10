<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class TrashDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trashDocument = Document::with('user')->onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(10);
        return view('documents.admin.trash.index', compact('trashDocument'));
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
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( string $id)
    {
        $document = Document::onlyTrashed()->findOrFail($id);

        // dd($document);
    
        // Cập nhật trường 'trangthai' thành 0 (bỏ ẩn)
        $document->trangthai = 0;
        $document->deleted_at = null;
        
        // Lưu thay đổi vào cơ sở dữ liệu
        $document->save();
        
        return redirect()->route('document.index')->with('message', 'Tài liệu đã được cập nhật và bỏ ẩn thành công!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
