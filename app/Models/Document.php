<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    /** @use HasFactory<\Database\Factories\DocumentFactory> */
    use HasFactory, softDeletes;
    protected $table = 'documents';
    protected $primaryKey = 'matailieu';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['matailieu', 'tentailieu', 'path', 'noidung', 'ngaydang', 'nguoidang'];
}
