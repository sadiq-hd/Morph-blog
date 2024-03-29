<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // تحديد العلاقات
    public function destroyComment($id)
    {
        $comment = Comment::findOrFail($id);

        // يجب تحقق الصلاحيات هنا قبل حذف التعليق

        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    

    // تحديد الحقول القابلة للتعديل
    protected $fillable = [
        'title', 'content', 'user_id', // الحقول التي يمكن تعديلها
    ];

    // أو يمكنك استخدام
    protected $guarded = []; // للسماح بتعديل جميع الحقول

    // الأكواد الإضافية التي تحتاجها
 
}
