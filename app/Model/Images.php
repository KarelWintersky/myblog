<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Images extends Model
{
    protected $table="images";
    protected $fillable = [
        'articles_id',
        'image',
    ];
    
    public function articles()
    {
         return $this->belongsTo('App\Model\Articles','articles_id','id');
    }
}


