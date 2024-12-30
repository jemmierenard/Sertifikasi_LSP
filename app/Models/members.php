<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class members extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = [
        'name',
        'phone_number',
        'address'
    ];

    public function borrowings()
    {
        return $this->hasMany(borrowing::class, 'member_id');
    }
}
