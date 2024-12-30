<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class borrowing extends Model
{
    use HasFactory;

    protected $table = 'borrowings'; 
    protected $fillable = [
        'member_id',
        'book_id',
        'borrow_date',
        'due_date',
        'return_date'
    ];

    public function members()
    {
        return $this->belongsTo(members::class, 'member_id');
    }

    public function books()
    {
        return $this->belongsTo(books::class,'book_id');
    }
}
