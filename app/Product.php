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
        'user_id','name','category_id','description','keywords', 'price','stock', 'slug','image', 'weight', 'size', 'status', 'code'
    ];

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
   public function sluggable()
   {
      return [
            'slug' => [
                'source' => 'name'
            ]
        ];
   }

  public function category()
  {
    return $this->hasOne('App\Category' , 'id', 'category_id');
  }

}
