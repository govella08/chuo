<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Waavi\Translation\Traits\Translatable as WaaviTransilation;

class Post extends Model
{
    	use WaaviTransilation;
	    
	    protected $translatableAttributes = ['title', 'description'];

	    protected $fillable=['title','description','title_transilation','description_transilation'];
}
