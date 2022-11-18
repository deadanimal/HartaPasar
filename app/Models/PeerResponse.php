<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeerResponse extends Model
{
    use HasFactory;

    protected $fillable = [
        'filled',
        'peer_offer_id',
        'user_id',
    ];     

    public function offer()
    {
        return $this->belongsTo(PeerOffer::class, 'peer_offer_id');
    }   
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }        
}
