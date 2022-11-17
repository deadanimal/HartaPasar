<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'roomname',
    ]; 

    public function attachments()
    {
        return $this->hasMany(ChatAttachment::class);
    }       
    
    public function messages()
    {
        return $this->hasMany(ChatMessage::class);
    }    
    
    public function participants()
    {
        return $this->hasMany(ChatRoomParticipant::class);
    }     
}
