<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;

    protected $fillable = [
        'fuelType',
        'trunkSize',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicles::class);
    }
}
