<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_room_id',
        'path',
    ]; 

    public function room()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id');
    }      
}
