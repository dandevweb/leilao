<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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