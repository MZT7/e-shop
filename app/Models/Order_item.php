<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    use HasFactory;

    protected $table = 'order_items';
    //primary key
    public $primarykey = 'id';
    // timestamps
    public $timestamps = true;

    protected $fillable = [
        'item_id',
        'order_id',
        'item_name',
        'item_price',
        'item_quantity',
        // 'type',
    ];

    public function order()
    {

        return $this->belongsTo(Order::class);
    }
}
