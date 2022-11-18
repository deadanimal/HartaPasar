<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'user_id',
        'amount',
        'price',
        'status',
        'tosell',
        'offer_submission_id',
        'accepted_at',
        'completed_at',
    ]; 

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }       

    public function attachments()
    {
        return $this->hasMany(OfferAttachment::class);
    }      

    public function queries()
    {
        return $this->hasMany(Query::class);
    }      

    public function submissions()
    {
        return $this->hasMany(OfferSubmission::class);
    }       
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }     
    
}
