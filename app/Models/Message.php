<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject', 'message', 'sender_id', 'receiver_id', 'is_read'
    ];

    public function getSenderNameAttribute()
    {
        $name = User::select('name')->where('id', $this->sender_id)->first();
        return $name;
    }

    public function getReceiverNameAttribute()
    {
        $name = User::select('name')->where('id', $this->receiver_id)->first();
        return $name;
    }
}
