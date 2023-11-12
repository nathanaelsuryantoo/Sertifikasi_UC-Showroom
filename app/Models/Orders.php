<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
    ];

    protected $table = 'orders';

    public function items(){
        return $this->hasMany(OrderItems::class);
    }

    public function customer(){
        return $this->belongsTo(Customers::class);
    }
}
