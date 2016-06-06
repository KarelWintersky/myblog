<?php

namespace App\Http\Controllers;

use App\Model\Comments;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends MainController
{
    public function save(Request $request, Comments $comments)
    {
        //Свои сообщения об ошибках, 
        //или прописать в массиве 'custom'
        //путь: resources/lang/ru or en/validation
        $messages = [
            'email.required' => 'Нам нужно знать ваш e-mail адрес!',
        ];
        
        $this->validate($request, [
            'user'   => 'required|max:25|min:4',
            'email'  => 'required|email',
            'message'=> 'required|min:5|max:400',
            'check_bot' => 'in:""',
        ],$messages);

        $comments->saveComment($request->all(),'guest');
        return back()->with('message','Спасибо за ваш комментарий. После проверки он будет опубликован'); //редирект обратно к форме с сообщением
    }

    public function show()
    {
        $comments=Comments::all();
        return view('comments',['comments'=>$comments]);
    }
}
