<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TagsGr extends Model
{
    protected $table="tags_gr";
    protected $fillable = [
        'articles_id',
        'tags_id'
    ];
}
