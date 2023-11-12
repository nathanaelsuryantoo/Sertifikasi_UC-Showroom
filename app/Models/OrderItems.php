<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItems extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'vehicle_id',
    ];

    protected $table = 'orders_items';

    public function order(){
        return $this->belongsTo(Orders::class);
    }

    public function vehicle(){
        return $this->belongsToMany(Vehicles::class);
    }
}
