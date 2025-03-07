<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $primaryKey = 'tentaikhoan';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['tentaikhoan', 'matkhau', 'vaitro', 'email'];

    // Mối quan hệ 1-1 với Student
    public function student()
    {
        return $this->hasOne(Student::class, 'tentaikhoan', 'tentaikhoan');
    }

    // Mối quan hệ 1-1 với Teacher
    public function teacher()
    {
        return $this->hasOne(Teacher::class, 'tentaikhoan', 'tentaikhoan');
    }

    // Mối quan hệ 1-1 với Admin
    public function admin()
    {
        return $this->hasOne(Admin::class, 'tentaikhoan', 'tentaikhoan');
    }

    // Mối quan hệ 1-n với feedbacks (nguoiphanhoi)
    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'nguoiphanhoi', 'tentaikhoan');
    }

    // Mối quan hệ 1-n với ResearchPaper (nguoidang)
    public function researchPapers()
    {
        return $this->hasMany(ResearchPaper::class, 'nguoidang', 'tentaikhoan');
    }

    // Mối quan hệ 1-n với News (nguoidang)
    public function news()
    {
        return $this->hasMany(News::class, 'nguoidang', 'tentaikhoan');
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
