<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc1McRequest extends Model
{
    use HasFactory;

    protected $table = 'fc1_mc_requests';

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
