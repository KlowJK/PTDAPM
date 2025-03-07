<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Feedback extends Model
{
    /** @use HasFactory<\Database\Factories\FeedbackFactory> */
    use HasFactory, SoftDeletes;
    protected $table = 'feedbacks';
    protected $primaryKey = 'mathacmac';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['mathacmac', 'noidung', 'ngaythacmac', 'ngayphanhoi', 'nguoiphanhoi'];

    // Mối quan hệ n-1 với Account (nguoiphanhoi)
    public function user()
    {
        return $this->belongsTo(User::class, 'nguoiphanhoi', 'tentaikhoan');
    }
}
