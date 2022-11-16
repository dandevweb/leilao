<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Auction extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'name',
        'address',
        'city',
        'state',
        'bank_id',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }
}