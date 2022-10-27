<?php

    namespace App\Traits;

    trait MagicTrait
    {
        public static function hello(){
            return 11111;
        }
        public $name = 'ololo';

        /**
         * @return mixed
         */
        public function getName()
        {
            return $this->name;
        }

        public function setName($name){
            $this->name = $name;
        }
    }