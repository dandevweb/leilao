<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
