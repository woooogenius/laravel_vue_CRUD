<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'content', 'board_id'
    ];

    protected $table = 'posts';

    protected $primaryKey = 'id';

    public function board()
    {
        return $this->belongsTo(Board::class);
    }

//    protected $casts = [
//        'posted_date' => 'datetime',
//        'update_time' => 'datetime',
//    ];



}
