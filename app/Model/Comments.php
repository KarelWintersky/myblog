<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table="comments";
    protected $fillable = [
        'articles_id',
        'active',
        'answer',
        'user',
        'email',
        'site',
        'message',
    ];

    public function articles()
    {
         return $this->belongsTo('App\Model\Articles','articles_id','id');
    }

    public function scopePublished($query){
        $query->where(['active'=>1]);
    }

    //Так как в теории/когда-либо наша база может изменить структуру
    //То добавим функцию, которая бы преобразовывала данные к нужному формату
    //И не искать исправления во всех контроллерах или ещё где-нибудь
    public function saveComment($date,$type){
        switch($type){
            case('guest'):
                $this->create([
                    'articles_id' => $date['article_id'],
                    'active'      => 0,
                    'answer'      => 0,
                    'user'        => $date['user'],
                    'email'       => $date['email'],
                    'site'        => '',
                    'message'     => $date['message']
                ]);
                break;
        }
    }
}
