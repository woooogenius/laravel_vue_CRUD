<?php

namespace App\Models;

use App\Http\Controllers\CommentController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'board_id', 'user_id'
    ];

    protected $table = 'posts';

    protected $primaryKey = 'id';

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }

//    protected $casts = [
//        'posted_date' => 'datetime',
//        'update_time' => 'datetime',
//    ];



}
