<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'receiver_id', 'message', 'type', 'read', 'attachment'];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
