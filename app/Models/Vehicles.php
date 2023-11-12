<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $fillable = [
        'model',
        'year',
        'totalPassenger',
        'manufacture',
        'price',
    ];

    protected $tables = 'vehicles';

    public function car(){
        return $this->hasOne(Cars::class);
    }

    public function truck(){
        return $this->hasOne(Trucks::class);
    }

    public function motorbike(){
        return $this->hasOne(Motorbikes::class);
    }

    public function orderItems(){
        return $this->hasMany(OrderItems::class);
    }
}
