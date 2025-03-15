<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Log;
use App\Models\News;

class NewsViewController extends Controller
{
    public function index()
    {
        $news = News::with(['user.student', 'user.teacher', 'user.admin','feedbacks'])->paginate(5);
        
        $updated_at = News::orderBy('updated_at', 'desc')->first();
        return view('newsviews.index', compact('news'));
    }

    public function show($matintuc)
    {
        try {
            // Tìm bài viết theo mã tin tức
            $newsItem = News::where('matintuc', $matintuc)->firstOrFail();

            // Trả về view hiển thị chi tiết tin tức
            return view('newsviews.show', compact('newsItem'));
        } catch (ModelNotFoundException $e) {
            // Ghi log lỗi nếu không tìm thấy bài viết
            Log::warning("Không tìm thấy tin tức với mã: $matintuc");

            return redirect()->back()->withErrors(['error' => 'Không tìm thấy bài viết.']);
        } catch (\Exception $e) {
            // Ghi log lỗi nếu có lỗi khác xảy ra
            Log::error('Lỗi khi lấy tin tức: ' . $e->getMessage());

            return redirect()->back()->withErrors(['error' => 'Không thể lấy thông tin bài viết.']);
        }
    }
}
