<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'id',
    ];

    protected $table = 'boards';

    protected $primaryKey = 'id';

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
