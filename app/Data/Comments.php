<?php
//Для формирования шапки лого, слайдер и прочее
//Сохраняем / кэшируем только то, что в последствии используем 
namespace App\Data;

use App\Data\Subsidiary\InterfaceData;
use App\Model\Comments as CommentsModel;
use Illuminate\Support\Facades\Cache;

class Comments implements InterfaceData
{
    protected $store = 'comments';
    
    public function clear(){
        Cache::store($this->store)->flush();
    }
    
    //$id - id статьи
    public function clearByIdArticle($id){
        Cache::store($this->store)->forget($id);
    }

    public function getCommentsByIdArticle($id){
        return Cache::store($this->store)->rememberForever(
            $id,
            function() use ($id){
                $data = [];
                $comments_model = new CommentsModel;
                $comments = $comments_model
                    -> published()
                    -> commentsByArticleId($id)
                    -> orderByParam()
                    -> get(); 
                foreach ($comments as $coment){
                    $data[] = [
                        'id'            =>  $coment->id,
                        'user'          =>  $coment->user,
                        'message'       =>  $coment->message,
                        'answer'        =>  $coment->answer,
                    ];
                }
                return $data;                
            }
        );
    }
}