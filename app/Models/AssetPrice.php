<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetPrice extends Model
{
    use HasFactory;

    protected $fillable = [
        'asset_id',
        'price',
    ]; 

    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }      
}
