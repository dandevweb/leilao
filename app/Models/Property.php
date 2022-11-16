<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'price',
        'increment',
        'category',
        'type',
        'description',
        'area_total',
        'area_util',
        'address',
        'city',
        'state',
        'auction_id',
    ];

    public function auction()
    {
        return $this->belongsTo(Auction::class);
    }

    public function offers()
    {
        return $this->hasMany(Offer::class)->orderBy('id', 'DESC');
    }

    public function lastOffer()
    {
        return $this->hasMany(Offer::class)->orderBy('id', 'DESC');
    }

}