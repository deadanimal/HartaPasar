<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'symbol',
        'asset_type',
        'si_unit',
        'decimals',
        'denominator',		        
    ];  
    
    public function prices() {
        return $this->hasMany(AssetPrice::class);
    }      
         
}
