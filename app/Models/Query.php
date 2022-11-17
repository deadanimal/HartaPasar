<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Query extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_id',
        'user_id',
    ]; 

    public function offer()
    {
        return $this->belongsTo(Offer::class);
    }   

    public function responses()
    {
        return $this->hasMany(QueryResponse::class);
    }       
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }      
}
