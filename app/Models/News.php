<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    /** @use HasFactory<\Database\Factories\NewsFactory> */
    use HasFactory, SoftDeletes;
    protected $table = 'news';
    protected $primaryKey = 'matintuc';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['matintuc', 'tentintuc', 'tomtat', 'path', 'ngaydang', 'nguoidang'];

    // Mối quan hệ n-1 với Account (nguoidang)
    public function user()
    {
        return $this->belongsTo(User::class, 'nguoidang', 'tentaikhoan');
    }
}
