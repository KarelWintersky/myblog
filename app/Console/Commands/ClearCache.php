<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ClearCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clearcache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Очищает весь автоматический кэш';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {   Cache::store('aside')->flush();
        $this->info('Кэш меню очищен');
        
        Cache::store('prevAll')->flush();
        $this->info('Кэш всех превью очищен');
        
        Cache::store('prevCat')->flush();
        $this->info('Кэш превью всех категорий очищен');
        
        Cache::store('prevTag')->flush();
        $this->info('Кэш превью всех тегов очищен');
        
        Cache::store('article')->flush();
        $this->info('Кэш всех статей очищен');
        
        Cache::store('comments')->flush();
        $this->info('Кэш всех комментариев к статье очищен');
        
        $this->info('Весь автоматический кэш очищен!');
    }
}
