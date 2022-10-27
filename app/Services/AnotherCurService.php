<?php

    namespace App\Services;

    use App\Contracts\CurServiceInterface;

    class AnotherCurService implements CurServiceInterface
    {

        public function getRate()
        {
           dd('AnotherCurService');
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