<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ResearchPaper extends Model
{
    /** @use HasFactory<\Database\Factories\ResearchPaperFactory> */
    use HasFactory, SoftDeletes;
}
