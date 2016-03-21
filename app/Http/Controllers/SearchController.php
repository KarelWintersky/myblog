<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Model\Articles;

  
class SearchController extends MainController
{
    //Да, можно было легко и просто и без всяких наворотов сделать
    //search/query?page=2, но мне хотелось сделать поиск 
    //search?q=query&page=2
    public function search(Request $request, Articles $article){
        $messages = [
            'q.required' => 'Введите что-нибудь для приличия!',
            'q.max'      => 'Слишколм много для поиска!',
            'q.min'      => 'Слишком мало для поиска!',
        ];
        
        //Валидация
        $this->validate($request, [
            'q' => 'required|max:50|min:4',
        ],$messages);
        
        //Запрос
        $this->data['query'] = $request->input('q');
        //Ответ
        $this->data['articles'] = $article->search($this->data['query'])->simplePaginate(20);
        //Добавляем query в путь
        $this->data['articles']->setPath(route('search',['q'=>$this->data['query']]));
        
        return view('search',$this->data);
    }
}