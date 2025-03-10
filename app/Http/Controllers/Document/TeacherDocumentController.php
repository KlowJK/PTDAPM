<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 

class TeacherDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $document = Document::withTrashed()
        ->with('user')
        ->where('nguoidang', 'wla')
        ->get();        
        return (view('documents.Teacher.index', compact('document')));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'matailieu' => 'required|string|max:255',
            'tentailieu' => 'required|string|max:255',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'path' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'noidung' => 'nullable|string',
        ]);
    
        $document = new Document();
        $document->matailieu = $request->matailieu;
        $document->tentailieu = $request->tentailieu;
        $document->nguoidang = 'wla'; // Gán giá trị cố định
        $document->noidung = $request->noidung;
    
        if ($request->hasFile('hinhanh')) {
            $path = $request->file('hinhanh')->store('uploads/hinhanh', 'public');
            $document->hinhanh = 'storage/' . $path; // Lưu đường dẫn vào DB
        }
    
        if ($request->hasFile('path')) {
            $filePath = $request->file('path')->store('uploads/tailieu', 'public');
            $document->path = 'storage/' . $filePath; // Lưu đường dẫn vào DB
        }
    
        $document->save();
    
        return redirect()->route('teacher.index')->with('message', 'Thêm tài liệu thành công');

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
        $item = Document::findOrFail($id);

        $request->validate([
            'matailieu' => 'required|string|max:255',
            'tentailieu' => 'required|string|max:255',
            'noidung' => 'nullable|string',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,gif|max:2048',
            'path' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $item->matailieu = $request->matailieu;
        $item->tentailieu = $request->tentailieu;
        $item->noidung = $request->noidung;

        if ($request->hasFile('hinhanh')) {
            // Xóa ảnh cũ nếu có
            if ($item->hinhanh && Storage::exists($item->hinhanh)) {
                Storage::delete($item->hinhanh);
            }

            $path = $request->file('hinhanh')->store('uploads/hinhanh', 'public');
            $item->hinhanh = 'storage/' . $path;
        }

        if ($request->hasFile('path')) {
            // Xóa file cũ nếu có
            if ($item->path && Storage::exists($item->path)) {
                Storage::delete($item->path);
            }

            $filePath = $request->file('path')->store('uploads/tailieu', 'public');
            $item->path = 'storage/' . $filePath;
        }

        $item->save();

        return redirect()->route('teacher.index')->with('message', 'Cập nhật tài liệu thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::withTrashed()->findOrFail($id);
        // dd($document);
    
        if ($document) {
            $document->forceDelete(); // Xóa vĩnh viễn bản ghi
            return redirect()->route('teacher.index')->with('message', 'Xóa thành công');
        } else {
            return redirect()->route('teacher.index')->with('message', 'Không tìm thấy tài liệu');
        }
    
    }
}
