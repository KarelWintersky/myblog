<?php

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
            ['name' => 'first_tag'  ],
            ['name' => 'second_tag' ],
            ['name' => 'third_tag'  ],
            ['name' => 'fourth_tag' ],
        ]);
    }
}

//создание категорий
class CategoriesTableSeeder extends Seeder {
    public function run()
    {
        DB::table('categories')->delete();
        DB::table('categories')->insert([
            ['name' => 'first_category',     'weight' => 10  ],
            ['name' => 'second_category',    'weight' => 20  ],
            ['name' => 'third_category',     'weight' => 30  ],
            ['name' => 'fourth_category',    'weight' => 40  ],
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
        DB::table('articles')->insert([
            [   'curl'      => 'My-first-article', 
                'active'    => 1, 
                'title'     => 'My first article',        
                'preview'   => str_random(200),                 
                'content'   => '<p>'.str_random(600).'</p>',
                'meta_description' => 'meta_description',
                'meta_keywords'    => 'meta_keywords',
                'categories_id'    => $categories[0]->id,
                'comments_enable'  => 1,
            ],
            [   'curl'      => 'My-second-article', 
                'active'    => 1, 
                'title'     => 'My second article',        
                'preview'   => str_random(200),                 
                'content'   => '<p>'.str_random(600).'</p>',
                'meta_description' => 'meta_description',
                'meta_keywords'    => 'meta_keywords',
                'categories_id'    => $categories[1]->id,
                'comments_enable'  => 1,
            ],
            [   'curl'      => 'My-third-article', 
                'active'    => 1, 
                'title'     => 'My third article',        
                'preview'   => str_random(200),                 
                'content'   => '<p>'.str_random(600).'</p>',
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
