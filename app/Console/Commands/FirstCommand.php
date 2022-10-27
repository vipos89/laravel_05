<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class FirstCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:nbrb {currency?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('sfsdfsfds');

//        $users = User::all();
//
//        $bar = $this->output->createProgressBar(count($users));
//
//        $bar->start();
//
//        foreach ($users as $user) {
//            $this->performTask($user);
//
//            $bar->advance();
//        }
//
//        $bar->finish();

       // $this->info();
        return 0;
    }
    public function performTask(){
        Artisan::call('make:model DD//User'.rand(1, 100));
    }
}
