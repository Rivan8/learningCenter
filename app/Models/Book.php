<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

PROTECTED $table = 'books';
    protected $fillable = [
        'title',
        'kode_buku',
        'author',
        'publisher',
        'year',
        'isbn',
        'category_id',
        'quantity',
        'description',
        'cover'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function borrowings()
    {
        return $this->hasMany(Borrowing::class);
    }
}