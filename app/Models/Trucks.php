<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trucks extends Model
{
    use HasFactory;

    protected $fillable = [
        'tiresCount',
        'cargoSize',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicles::class);
    }
}
