<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
   use Sluggable;

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','product_name','category_id','description','keywords', 'price','stock', 'product_slug','image', 'weight', 'size', 'product_status', 'product_code'
    ];

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
   public function sluggable()
   {
      return [
            'product_slug' => [
                'source' => 'product_name'
            ]
        ];
   }

}
