<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorbikes extends Model
{
    use HasFactory;

    protected $fillable = [
        'storageSize',
        'fuelCapacity',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicles::class);
    }
}
