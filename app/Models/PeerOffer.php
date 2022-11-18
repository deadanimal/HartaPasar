<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerOffer extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'add_liquidity', # meaning to sell
        'filled', # filled means offer has been filled
        'peer_response_id', # selected response to fill
        'user_id',
        'amount',
        'price',
        'status',

        'public', # available on public trading page
        'target_id' # provision to specific user...
    ]; 

    public function responses()
    {
        return $this->hasMany(PeerResponse::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }    

}
