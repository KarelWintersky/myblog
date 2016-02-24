<?php

namespace App\Http\Controllers;

use App\Model\Comments;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function save(Request $request, Comments $comments)
    {
        $this->validate($request, [
            'user'   => 'required|max:25|min:4',
            'email'  => 'required|email',
            'message'=> 'required|min:5|max:400',
            'check_bot' => 'in:""',
        ]);

        $comments->saveComment($request->all(),'guest');
        return back()->with('message','Спасибо за комментарий. После проверки он будет опубликован'); //редирект обратно к форме с сообщением
    }

    public function show()
    {
        $comments=Comments::all();
        dd($comments);
        return view('comments',['comments'=>$comments]);
    }
}
