<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'published_date',
        'member_id',
    ];

    public function member()
    {
        return $this->belongsTo(members::class, 'member_id');
    }

    public function borrowings(){
        return $this->hasMany(borrowing::class, 'book_id');
    }
}
