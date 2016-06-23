## Демонстрационный блог. 

* Laravel 5.2
* Статьи, Теги, Категории
* Комментарии (Для создания использовался построитель форм [laravelcollective/html v5.2] (https://github.com/LaravelCollective/html))
* Поиск: [nicolaslopezj/searchable v1.*] (https://github.com/nicolaslopezj/searchable)
* Панель администратора: [frozennode/administrator v5.*] (https://github.com/FrozenNode/Laravel-Administrator)
* Хлебные крошки: [davejamesmiller/laravel-breadcrumbs v3.0] (https://github.com/davejamesmiller/laravel-breadcrumbs),
* Автоматическое кэширование (В Laravel 5 убрали возможность 'из коробки' кешировать запросы, кэширование по-умолчанию файловое)
* Расширенный Blade. Добавлен оператор @SWITCH	
* Расширенная консоль artisan. Добавлена команда очистки кэша
* Миграции, Сиды
* Вёрстка: html5, bootstrap-3.3.6
* Для разработчика уже присутствует ([barryvdh/laravel-debugbar v2.1] (https://github.com/barryvdh/laravel-debugbar), [barryvdh/laravel-ide-helper v2.1] (https://github.com/barryvdh/laravel-ide-helper))
* Сам блог [mybloglaravel5.atwebpages.com] (http://mybloglaravel5.atwebpages.com)
	
## Установка

Требования : php > 5.5.9, git, composer

В консоли по очереди выполните команды: 

	git clone https://github.com/panfillich/myblog.git 
	composer install 
	
Переименуйте файл .env.example в .env из корневой директории и выполните команду: 

	'id_game'	:'game_1',	//id тега, куда помещаем canvas !обязательный параметр
	'id_config'	:'conf_1',	//id тега, куда помещаем меню настроек
	'id_points'	:'point_1'	//id тега, куда помещаем очки
	
В .env и config\database настройте соединение с БД и продолжите выполнение команд: 

	php artisan migrate 
	php artisan db:seed 







