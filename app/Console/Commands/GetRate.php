<?php

namespace App\Console\Commands;

use App\Helpers\CurrencyHelper;
use App\Mail\CurrencyMail;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class GetRate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:rate {currency} {--email=ololo@mail.ru}';

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
        $currency = $this->argument('currency');
        $rate = CurrencyHelper::getRate($currency);

        Mail::to($this->option('email'))
            ->send(new CurrencyMail($rate['CUR_NAME'], $rate['CUR_RATE']));
        return 0;
    }
}
