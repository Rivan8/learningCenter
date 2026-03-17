<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fc2Fc3Request extends Model
{
    use HasFactory;

    protected $table = 'fc2_fc3_requests';

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
