<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Http\Request;

class AcceptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $accept = Document::with('user')->where('TrangThai', 2)->orderBy('created_at', 'desc')->paginate(10);
        return view('documents.admin.trash.accept', compact('accept'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(Request $request, string $id)
    {
        $document = Document::findOrFail($id);

        //Set trạng thái từ 2 sang 0 => từ duyệt qua public
        $document->trangthai = 0;
        $document->save();

        return redirect()->route('document.index')->with('message', 'Tài liệu đã được duyệt thành công');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
