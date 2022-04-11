<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
      //table name
    protected $table = 'products';
    //primary key
    public $primarykey = 'id';
    // timestamps
    public $timestamps = true;

    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'type',
    ];

    // public function getPriceAttribute($value)
    // {
    //   $newForm ='$'.$value;
    //   return $newForm;


    // }


}
