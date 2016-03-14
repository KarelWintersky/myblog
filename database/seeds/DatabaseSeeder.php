<?php //php artisan db:seed

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        
        $this->call(UserTableSeeder::class);
        $this->command->info('Аdmin was added: name:admin; password:123456; email:admin@gmail.com;');
        
        $this->call(TagsTableSeeder::class);
        $this->command->info('Tags where added;');
        
        $this->call(CategoriesTableSeeder::class);
        $this->command->info('Categories where added;');
        
        $this->call(MenuTableSeeder::class);
        $this->command->info('Menu was added;');
        
        $this->call(ArticlesTableSeeder::class);
        $this->command->info('Articles where added;');
        
        $this->call(TagsGrTableSeeder::class);
        $this->command->info('Tags where added;');  
        
        $this->call(CommentsTableSeeder::class);
        $this->command->info('Comments where added;'); 
        
        Model::reguard();
    }
}

//создание администратора
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            'name' => 'admin',	//str_random(10)				
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}

//Создание тегов
class TagsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('tags')->delete();
        DB::table('tags')->insert([
            [   'name' => 'first_tag',
                'curl' => 'first-tag',
            ],
            [   'name' => 'second_tag',
                'curl' => 'second-tag',
            ],
            [   'name' => 'third_tag',
                'curl' => 'third-tag',
            ],
            [   'name' => 'fourth_tag',
                'curl' => 'fourth-tag',
            ],
        ]);
    }
}

//создание категорий
class CategoriesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['name' => 'first category',  'curl' => 'first-category',  'weight' => 10  ],
            ['name' => 'second category', 'curl' => 'second-category', 'weight' => 20  ],
            ['name' => 'third category',  'curl' => 'third-category',  'weight' => 30  ],
            ['name' => 'fourth category', 'curl' => 'fourth-category', 'weight' => 40  ],
        ]);
    }
}

//Создаем меню навигации
class MenuTableSeeder extends Seeder {
    public function run()
    {
        DB::table('menus')->delete();
        DB::table('menus')->insert([
            ['active' => '1', 'weight' => 10, 'title' => 'Home',        'url' => '/', 'position' => 'nav_top' ],
            ['active' => '1', 'weight' => 20, 'title' => 'About us',    'url' => '#', 'position' => 'nav_top' ],
            ['active' => '1', 'weight' => 30, 'title' => 'Categories',  'url' => '#', 'position' => 'nav_top' ],
            ['active' => '1', 'weight' => 40, 'title' => 'Sale',        'url' => '#', 'position' => 'nav_top' ],
            ['active' => '0', 'weight' => 50, 'title' => 'UnPublished', 'url' => '#', 'position' => 'nav_top' ],
        ]);
    }
}

//Cоздаём статьи
class ArticlesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('articles')->delete();        
        $categories = DB::table('categories')->get(); 
        
        //Рыбные текста:
        $paragraph_1 = '<p class="text-justify">Каждый веб-разработчик знает, что такое текст-«рыба». Текст этот, 
            не имеет никакого отношения к обитателям водоемов. Используется он веб-дизайнерами для вставки на 
            интернет-страницы и демонстрации внешнего вида контента, просмотра шрифтов, абзацев, отступов и т.д. 
            Так как цель применения такого текста исключительно демонстрационная, то и смысловую нагрузку ему 
            нести совсем необязательно. Более того, нечитабельность текста сыграет на руку при оценке качества 
            восприятия макета.</p>';
        $paragraph_2 = '<p class="text-justify">Самым известным «рыбным» текстом является знаменитый Lorem ipsum. 
            Считается, что впервые его применили в книгопечатании еще в XVI веке. Своим появлением Lorem ipsum 
            обязан древнеримскому философу Цицерону, ведь именно из его трактата «О пределах добра и зла» 
            средневековый книгопечатник вырвал отдельные фразы и слова, получив текст-«рыбу», широко используемый 
            и по сей день. Конечно, возникают некоторые вопросы, связанные с использованием Lorem ipsum на сайтах 
            и проектах, ориентированных на кириллический контент – написание символов на латыни и на кириллице 
            значительно различается.</p>';
        $paragraph_3 = '<p class="text-justify">И даже с языками, использующими латинский алфавит, могут возникнуть 
            небольшие проблемы: в различных языках те или иные буквы встречаются с разной частотой, имеется разница 
            в длине наиболее распространенных слов. Отсюда напрашивается вывод, что все же лучше использовать в 
            качестве «рыбы»  текст на том языке, который планируется использовать при запуске проекта. Сегодня 
            существует несколько вариантов Lorem ipsum, кроме того, есть специальные генераторы, создающие собственные 
            варианты текста на основе оригинального трактата, благодаря чему появляется возможность получить более длинный 
            неповторяющийся набор слов.</p>';

        
        DB::table('articles')->insert([
            [   'curl'      => 'My-first-article', 
                'active'    => 1, 
                'title'     => 'My first article',        
                'preview'   => $paragraph_1,//str_random(200),                 
                'content'   => $paragraph_1.$paragraph_2.$paragraph_3,
                'meta_description' => 'meta_description',
                'meta_keywords'    => 'meta_keywords',
                'categories_id'    => $categories[0]->id,
                'comments_enable'  => 1,
            ],
            [   'curl'      => 'My-second-article', 
                'active'    => 1, 
                'title'     => 'My second article',        
                'preview'   => $paragraph_2,                 
                'content'   => $paragraph_2.$paragraph_3.$paragraph_1,
                'meta_description' => 'meta_description',
                'meta_keywords'    => 'meta_keywords',
                'categories_id'    => $categories[1]->id,
                'comments_enable'  => 1,
            ],
            [   'curl'      => 'My-third-article', 
                'active'    => 1, 
                'title'     => 'My third article',        
                'preview'   => $paragraph_3,                 
                'content'   => $paragraph_3.$paragraph_1.$paragraph_2,
                'meta_description' => 'meta_description',
                'meta_keywords'    => 'meta_keywords',
                'categories_id'    => $categories[1]->id,
                'comments_enable'  => 0,
            ],
        ]);
    }
}

//Создаем промежуточную таблицу между Статьями и тегами
class TagsGrTableSeeder extends Seeder {
    public function run()
    {
        DB::table('tags_gr')->delete();
        
        $tags = DB::table('tags')->get();
        $articles =  DB::table('articles')->get();
        
        DB::table('tags_gr')->insert([  
            ['articles_id' => $articles[0]->id,  'tags_id' => $tags[0]->id  ],
            ['articles_id' => $articles[0]->id,  'tags_id' => $tags[1]->id  ],
            ['articles_id' => $articles[0]->id,  'tags_id' => $tags[2]->id  ],
            ['articles_id' => $articles[1]->id,  'tags_id' => $tags[0]->id  ],
            ['articles_id' => $articles[1]->id,  'tags_id' => $tags[1]->id  ],
            ['articles_id' => $articles[2]->id,  'tags_id' => $tags[0]->id  ],
        ]); 
    }
}

//Создаёс коментарии
//Создаем промежуточную таблицу между Статьями и тегами
class CommentsTableSeeder extends Seeder {
    public function run()
    {
        DB::table('comments')->delete();
        $articles =  DB::table('articles')->get();
        
        DB::table('comments')->insert([ 
            ['articles_id' => $articles[0]->id, 'active' => 1, 'answer' => 0, 'user' => 'Пушкин', 'email' => 'pushkin@gmail.com', 'site' => 'pushkin.com',
             'message' => 'Алекса́ндр Серге́евич Пу́шкин — русский поэт, драматург и прозаик. Ещё при жизни Пушкина сложилась его репутация величайшего
                           национального русского поэта. Пушкин рассматривается как создатель современного русского литературного языка.'
            ],
            ['articles_id' => $articles[0]->id, 'active' => 1, 'answer' => 0, 'user' => 'Есенин', 'email' => 'esenin@gmail.com', 'site' => 'esenin.com',
             'message' => 'Серге́й Алекса́ндрович Есе́нин — русский поэт, представитель новокрестьянской поэзии и лирики, а в более позднем периоде творчества
                              — имажинизма'
            ],
            ['articles_id' => $articles[0]->id, 'active' => 1, 'answer' => 1, 'user' => 'Хозяин блога', 'email' => '', 'site' => '',
              'message' => '<p>Хорошие рыбные комментарии! Всем спасибо.</p>'  
            ],
            ['articles_id' => $articles[0]->id, 'active' => 1, 'answer' => 0, 'user' => 'Толстой', 'email' => 'levtolstoy@gmail.com', 'site' => 'www.levtolstoy.ru',
             'message' => 'Граф Лев Никола́евич Толсто́й — один из наиболее известных русских писателей и мыслителей, один из величайших писателей мира.
                           Участник обороны Севастополя'
            ],
        ]); 
    }
}