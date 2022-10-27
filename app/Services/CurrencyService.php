<?php

    namespace App\Services;

    use App\Contracts\CurServiceInterface;
    use Illuminate\Support\Facades\Cache;

    class CurrencyService implements CurServiceInterface
    {

        public function getRate(){
           Cache::put('xxxx', 'xxxxx');
        }

        public function hello()
        {
            // TODO: Implement hello() method.
        }

        public function hello2222()
        {
            // TODO: Implement hello2222() method.
        }
    }