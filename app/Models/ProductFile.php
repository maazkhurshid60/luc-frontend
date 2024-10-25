<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductFile extends Model
{
    protected $fillable = [
    	'title',
    	'type',
    	'file',
    	'details',
    	'product_id'
    ];
   	public function product()
   	{
   		return $this->belongsTo(Product::class,'id','product_id');
   	}
}
