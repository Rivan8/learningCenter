<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade3Request extends Model
{
    use HasFactory;

    protected $table = 'grade3_requests';

    protected $fillable = [
        'user_id',
        'alasan',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}