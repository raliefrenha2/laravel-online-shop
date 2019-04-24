<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Category extends Model
{
	use Sluggable;
    
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_name', 'category_slug', 'sort',
    ];

    /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
   public function sluggable()
   {
      return [
            'category_slug' => [
                'source' => 'category_name'
            ]
        ];
   }
}
