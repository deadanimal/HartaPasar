<?php

namespace App\Http\Controllers;

use DateTime;

use Illuminate\Http\Request;

use App\Models\Asset;
use App\Models\Offer;
use App\Models\OfferSubmission;
use App\Models\Query;
use App\Models\QueryResponse;

class TradeController extends Controller
{

    public function create_offer(Request $request) {
        $user = $request->user();
        $asset = Asset::find($request->asset_id);
        Offer::create([
            'asset_id' => $asset->id,
            'user_id' => $user->id,
            'amount' => $request->amount * pow(10, $asset->decimals),
            'desired_price' => $request->desired_price * pow(10,6),
            'bound_price' => $request->bound_price * pow(10,6),
            'currency' => $request->currency,
            'tosell' => $request->tosell,
            'status' => 'created'
        ]);
        return back();
    }

    public function submit_offer(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $offer = Offer::find($id);
        if($offer->trader_id == $user->id) {
            return back();
        }
        OfferSubmission::create([
            'offer_id' => $offer->id,
            'user_id' => $user->id,
            'price' => $request->price,            
        ]);
        return back();
    }    

    public function accept_offer(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $offer = Offer::find($id);
        if($offer->trader_id != $user->id) {
            return back();
        }        
        $offer->offer_submission_id = $request->offer_submission_id;
        $offer->status = 'accepted';
        $offer->accepted_at = new DateTime('now');
        $offer->save();
        return back();
    }

    public function complete_offer(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $offer = Offer::find($id);
        $submission = OfferSubmission::find($offer->submission_id);
        if($user->id != $submission->user_id) {
            return back();
        }
        $offer->status = 'completed';
        $offer->completed_at = new DateTime('now');
        $offer->save();
        return back();
    }    

    public function query_offer(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $offer = Offer::find($id);   
        if($offer->trader_id == $user->id) {
            return back();
        }                
        $query = Query::create([
            'offer_id'=> $offer->id,
            'user_id'=> $user->id,            
        ]);
        QueryResponse::create([
            'query_id' => $query->id,
            'user_id' => $user->id,
            'message' => $request->message            
        ]);
        return back();
    }

    public function respond_to_query(Request $request) {
        $user = $request->user();
        $id = $request->route('id');
        $offer = Offer::find($id);          
        $id2 = $request->route('id2');
        $query = Query::find($id2);  
        if ($user->id != $query->user_id || $user->id != $offer->trader_id) {

        }
        QueryResponse::create([
            'query_id' => $query->id,
            'user_id' => $user->id,
            'message' => $request->message            
        ]);
        return back();              
    }

    public function view_offer(Request $request) {
        $id = $request->route('id');
        $offer = Offer::find($id); 
        return view('offer', compact('offer'));
    }

    public function view_offers(Request $request) {
        $id = $request->route('id');
        $assets = Asset::all();
        $offers = Offer::where('status', 'created')->get(); 
        return view('offers', compact('offers', 'assets'));
    }    
}
