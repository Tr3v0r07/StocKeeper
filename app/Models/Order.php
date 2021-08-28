<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cust_name',
        'status',
        'name',
        'roll',
        'color',
        'gauge',
        'desc',
        'length',
        'quantity',
        'order_id',
        'ppu',

    ];
}
