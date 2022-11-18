<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asset;
use App\Models\ChatRoom;
use App\Models\ChatRoomParticipant;
use App\Models\User;

use App\Models\PeerOffer;
class WebController extends Controller
{
    public function home(Request $request) {
        return view('home');
    }

    public function dashboard(Request $request) {
        return view('dashboard');
    }  

    public function view_traders(Request $request) {
        $name = $request->route('name');
        $promoted_traders = User::where('promoted', true)->get();
        $high_traders = User::where('promoted', true)->get();
                 
        return view('traders', compact('promoted_traders', 'high_traders'));
    }    
    
    public function view_trader(Request $request) {
        $name = $request->route('name');
        $user = $request->user();
        $trader = User::where('public_name', $name)->first();

        $buy_offers = PeerOffer::where([
            ['status','=', 'created'],
            ['add_liquidity', '=', false],
            ['user_id','=', $trader->id],        
        ])->get();

        $sell_offers = PeerOffer::where([
            ['status','=', 'created'],
            ['add_liquidity', '=', true],
            ['user_id','=', $trader->id],           
        ])->get();

        $chatroom_exists = false;

        $exist1 = ChatRoomParticipant::where('user_id', $user->id)->first();
        $exist2 = ChatRoomParticipant::where('user_id', $trader->id)->first();

        if($exist1 && $exist2) {
            $chatroom_exists = true;
            $chatroom = ChatRoom::find($exist1->chat_room_id);
        } else {
            $chatroom = collect();
        }

        return view('trader', compact('trader', 'buy_offers', 'sell_offers', 'chatroom' ,'chatroom_exists'));
    }

    public function view_assets(Request $request) {
        $assets = Asset::all();
        return view('assets', compact('assets'));
    }  
    
    public function view_asset(Request $request) {
        $id = $request->route('id');
        $asset = Asset::find($id);
        return view('asset', compact('asset'));
    }     
}
