<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    //primary key
    public $primarykey = 'id';
    // timestamps
    public $timestamps = true;

    protected $fillable = [
        'status',
        'user_id',
        'date',
        'del_date',
        'price',
        'total_quantity',

        // 'type',
    ];

    public function user()
    {

        return $this->belongsTo(User::class);
    }

    public function order_item()
    {

        return $this->hasMany(Order_item::class);
    }
}
