<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $table = 'registrations';

    protected $fillable = [
        'user_id',
        'activity_id',
        'status',      // pending | approved | rejected | cancelled
        // --- các trường của form đăng ký ---
        'name',
        'gender',
        'birthday',
        'phone',
        'school',
        'experience',
        'note',
    ];

    protected $casts = [
        'birthday' => 'date',
    ];

    // ----- Quan hệ -----
    // Đơn đăng ký thuộc về 1 tình nguyện viên
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Đơn đăng ký thuộc về 1 hoạt động
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
}