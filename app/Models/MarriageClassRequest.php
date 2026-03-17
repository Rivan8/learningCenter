<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarriageClassRequest extends Model
{
    use HasFactory;

    protected $table = 'marriage_class_requests';

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