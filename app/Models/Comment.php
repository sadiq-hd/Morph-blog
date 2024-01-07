<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    // تحديد العلاقات
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // تحديد الحقول القابلة للتعديل
    protected $fillable = [
        'content', 'user_id', 'post_id', // الحقول التي يمكن تعديلها
    ];

    // أو يمكنك استخدام
    protected $guarded = []; // للسماح بتعديل جميع الحقول

    // الأكواد الإضافية التي تحتاجها
}
