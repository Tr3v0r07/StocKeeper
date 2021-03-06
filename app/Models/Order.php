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
        'id',
        'cust_name',
        'status'

    ];

        /**
     * Get the route key for the model.
     *
     * @return string
     */
    // public function getRouteKeyName()
    // {
    //     return 'status';
    // }
}
