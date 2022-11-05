<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->hasOne(Property::class);
    }

    public function vehicle()
    {
        return $this->hasOne(Vehicle::class);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }
}