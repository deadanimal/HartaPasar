<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingSettlement extends Model
{
    use HasFactory;

    protected $fillable = [
        'settled',
        'amount',
        'trading_relationship_id',
    ]; 

    public function trading_relationship()
    {
        return $this->belongsTo(TradingRelationship::class, 'trading_relationship_id');
    }       
}
