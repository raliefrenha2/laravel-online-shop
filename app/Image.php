<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id', 'name', 'image',
    ];

	public function product()
	{
		return $this->belongsTo('App\Product');
	}
}
