<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCurrency extends Model
{
    use HasFactory;

    protected $fillable = [
        'currency',
        'price',
    ]; 
    
}
