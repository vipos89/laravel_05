<?php

namespace App\Console\Commands;

use App\Helpers\CurrencyHelper;
use App\Models\Rate;
use Illuminate\Console\Command;

class DailyRates extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'get:rates';

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
        $currencies = CurrencyHelper::getCurrencies();

        foreach ($currencies as $currency){
            Rate::create([
                'currency' => $currency['Cur_Abbreviation'],
                'scale' =>  $currency['Cur_Scale'],
                'rate' =>  $currency['Cur_OfficialRate'],
                'date' =>  $currency['Date'],
            ]);
        }


        return 0;
    }
}
