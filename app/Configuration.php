<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuration extends Model
{
    protected $fillable = ['webname', 'website', 'email', 'address', 'telephone', 'logo', 'icon', 'tagline', 'keywords', 'metatext', 'description', 'facebook', 'instagram', 'twitter', 'payment_account'];
}
