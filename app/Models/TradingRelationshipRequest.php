<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TradingRelationshipRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'approved',
        'approved_at',
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
}
