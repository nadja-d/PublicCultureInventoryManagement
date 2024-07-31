<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        'customer_name',
        'productID', 
        'quantityOrdered', 
        'total_amount',
        'order_status',
        'created_at',
    ];

    protected $primaryKey = 'orderID';
    public $timestamps = false;

    public static function getAllOrders()
    {
        $results = DB::select('CALL GetAllOrders()');
        
        return self::hydrate((array) $results);
    }

}