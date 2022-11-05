<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'increment',
        'stored_in',
        'quantity',
        'description',
        'auction_id'
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }
}