<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferSubmissionCredit extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'user_id',
        'trading_relationship_id',
    ]; 

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }  
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }   
    
    public function trading_relationship()
    {
        return $this->belongsTo(TradingRelationship::class);
    }      
}
