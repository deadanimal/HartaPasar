<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoomParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'chat_room_id',
        'user_id',
    ]; 

    public function room()
    {
        return $this->belongsTo(ChatRoom::class, 'chat_room_id');
    }   
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }      
}
