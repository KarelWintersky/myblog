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
    protected $signature = 'automatic_cache:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clears automatic cache';

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
        $this->info('Asides cleared');
        
        Cache::store('prevAll')->flush();
        $this->info('Prev. cleared');
        
        Cache::store('prevCat')->flush();
        $this->info('Prev./cat. cleared');
        
        Cache::store('prevTag')->flush();
        $this->info('Prev./tag. cleared');
        
        Cache::store('article')->flush();
        $this->info('Articles cleared');
        
        Cache::store('comments')->flush();
        $this->info('Comments cleared');
        
        $this->info('All automatic cache cleared');
    }
}
