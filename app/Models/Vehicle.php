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

    public function images()
    {
        return $this->hasMany(VehicleImage::class)->orderBy('cover', 'DESC');
    }

    public function offers()
    {
        return $this->hasMany(Offer::class)->orderBy('id', 'desc');
    }

    public function lastOffer()
    {
        return $this->hasMany(Offer::class)->orderBy('id', 'desc');
    }
}