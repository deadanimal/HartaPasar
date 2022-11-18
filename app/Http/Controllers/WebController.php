<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Asset;
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
    
    public function view_trader(Request $request) {
        $name = $request->route('name');
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
                 
        return view('trader', compact('trader', 'buy_offers', 'sell_offers'));
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
