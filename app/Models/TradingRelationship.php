<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingRelationship extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency',
        'max_amount',
        'amount',
        'active',
        'creditor_id',
        'debtor_id',
    ]; 

    public function creditor()
    {
        return $this->belongsTo(User::class, 'creditor_id');
    }       

    public function debtor()
    {
        return $this->belongsTo(User::class, 'debtor_id');
    }    
    
    public function credit_asks()
    {
        return $this->hasMany(TradingCreditAsk::class);
    }      
    
    public function settlements()
    {
        return $this->hasMany(TradingSettlement::class);
    }    
    
    public function submissions()
    {
        return $this->hasMany(OfferSubmissionCredit::class);
    }      
      
}
