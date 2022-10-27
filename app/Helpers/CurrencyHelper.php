<?php

    namespace App\Helpers;

    use Illuminate\Support\Facades\Http;

    class CurrencyHelper
    {
        public static function getCurrencies($onDate=null, $periodicity=0){
            $q = [
               'periodicity' => $periodicity,
                'onDate' => $onDate
            ];
            $response = Http::get('https://www.nbrb.by/api/exrates/rates', $q);
            return $response->json();
        }

        public static function getRate($currencyName, $onDate=null){
            $currencies = self::getCurrencies($onDate);
            return $currencies[$currencyName];
        }

    }