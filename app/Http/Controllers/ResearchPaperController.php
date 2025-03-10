<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResearchPaper;
use App\Http\Requests\StoreResearchPaperRequest;
use App\Http\Requests\UpdateResearchPaperRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ResearchPaperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $papers = ResearchPaper::orderBy('updated_at', 'desc')->paginate(5);
        return view('researchpapers.index', compact('papers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('researchpapers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mabaiviet' => 'required|unique:research_papers,mabaiviet|max:50',
            'tenbaiviet' => 'required|max:255',
            'mota' => 'required|max:255',
            'noidung' => 'required',
            'path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ngaydang' => 'date',
        ]);

        $path = $request->file('path') ? $request->file('path')->store('researchpapers') : null;
        $hinhanh = $request->file('hinhanh') ? $request->file('hinhanh')->store('images', 'public') : null;
// Không sửa đổi đường dẫn, chỉ lưu trữ nó như được trả về bởi phương thức store
        // Thay đổi để loại bỏ "public/" trong đường dẫn lưu vào database
        $hinhanh = $hinhanh ? str_replace('public', 'storage', $hinhanh) : null;


        ResearchPaper::create([
            'mabaiviet' => $request->mabaiviet,
            'tenbaiviet' => $request->tenbaiviet,
            'mota' => $request->mota,
            'noidung' => $request->noidung,
            'path' => $path,
            'hinhanh' => $hinhanh,
            'ngaydang' => $request->ngaydang ?: now(), // Lấy giá trị từ form thay vì now()
            'nguoidang' => 'bao94',
            // Auth::user()->tentaikhoan,
        ]);

        return redirect()->route('researchpapers.index')->with('success', 'Bài viết đã được đăng.');
    }

    /**
     * Display the specified resource.
     */
    public function show($mabaiviet)
    {
        //
        $paper = ResearchPaper::findOrFail($mabaiviet);
        return view('researchpapers.show', compact('paper'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mabaiviet)
    {
        $paper = ResearchPaper::findOrFail($mabaiviet);
        return view('researchpapers.edit', compact('paper'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $mabaiviet)
    {
        //
        $paper = ResearchPaper::findOrFail($mabaiviet);

        $request->validate([
            'tenbaiviet' => 'required|max:255',
            'mota' => 'nullable|max:255',
            'noidung' => 'required',
            'path' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'hinhanh' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('path')) {
            Storage::delete($paper->path);
            $paper->path = $request->file('path')->store('researchpapers');
        }

        if ($request->hasFile('hinhanh')) {
            // Xóa file cũ (đảm bảo xử lý các định dạng đường dẫn khác nhau)
            if ($paper->hinhanh) {
                if (strpos($paper->hinhanh, 'storage/') === 0) {
                    Storage::disk('public')->delete(str_replace('storage/', '', $paper->hinhanh));
                } else {
                    Storage::disk('public')->delete($paper->hinhanh);
                }
            }
            $paper->hinhanh = $request->file('hinhanh')->store('images', 'public');
        }

        $paper->update([
            'tenbaiviet' => $request->tenbaiviet,
            'mota' => $request->mota,
            'noidung' => $request->noidung,
        ]);

        return redirect()->route('researchpapers.index')->with('success', 'Bài viết đã được cập nhật.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mabaiviet)
    {
        //
        $paper = ResearchPaper::findOrFail($mabaiviet);
        Storage::delete([$paper->path, $paper->hinhanh]);
        $paper->delete();
        return redirect()->route('researchpapers.index')->with('success', 'Bài viết đã bị xóa.');
    }
}
