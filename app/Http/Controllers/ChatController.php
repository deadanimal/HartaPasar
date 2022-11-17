<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ChatAttachment;
use App\Models\ChatMessage;
use App\Models\ChatRoom;
use App\Models\ChatRoomParticipant;

class ChatController extends Controller
{

    public function create_chatroom(Request $request) {
        $user = $request->user();
        $receiver = $request->receiver_id;

        $exist1 = ChatRoomParticipant::where('user_id', $user->id)->first();
        $exist2 = ChatRoomParticipant::where('user_id', $receiver->id)->first();

        if($exist1 && $exist2) {
            return back();
        }

        $chatroom = ChatRoom::create();
        ChatRoomParticipant::create([
            'chat_room_id' => $chatroom->id,
            'user_id' => $user->id,            
        ]);
        ChatRoomParticipant::create([
            'chat_room_id' => $chatroom->id,
            'user_id' => $receiver->id,            
        ]);        
        return back();
    }

    public function view_chatroom(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $chatroom = ChatRoom::find($id);

        $exists = ChatRoomParticipant::where([
            'chat_room_id' => $chatroom->id,
            'user_id' => $user->id,            
        ])->exists();
        if ($exists == false) {
            return back();
        } 
        return view('chat.specific', compact('chatroom'));
    }

    public function send_message(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $chatroom = ChatRoom::find($id);

        $exists = ChatRoomParticipant::where([
            'chat_room_id' => $chatroom->id,
            'user_id' => $user->id,            
        ])->exists();
        
        if ($exists == false) {
            return back();
        } 

        ChatMessage::create([
            'chat_room_id' => $chatroom->id,
            'message' => $request->message
        ]);
        return back();
    }    

    public function block_chatroom() {}
}
