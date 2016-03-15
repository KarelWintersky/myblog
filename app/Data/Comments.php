<?php
//Для формирования шапки лого, слайдер и прочее
//Сохраняем / кэшируем только то, что в последствии используем 
namespace App\Data;

use App\Data\Subsidiary\Data;
use App\Data\Subsidiary\InterfaceData;
use App\Model\Comments as CommentsModel;
use Illuminate\Support\Facades\Cache;

class Comments extends Data implements InterfaceData
{
    public function clearAllCash()
    {
        
    }

    public function clearCash($condition = [])
    {

    }

    public function getCommentsByIdArticle($id){
        return Cache::store('comments')->rememberForever(
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