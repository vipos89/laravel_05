<?php

    namespace App\Listeners;

    use App\Events\ProductAddedEvent;
    use Illuminate\Auth\Events\Registered;

    class ProductSubscriber
    {
        public function addHandler($event){
            dd($event);
        }

        public function registeredHandler($event){

        }

        /**
         * Зарегистрировать слушателей для подписчика.
         *
         * @param  \Illuminate\Events\Dispatcher  $events
         *
         */
        public function subscribe($events){
//            $events->listen(ProductAddedEvent::class,
//                [ProductSubscriber::class, 'addHandler']);
//            $events->listen(Registered::class,
//                [ProductSubscriber::class, 'registeredHandler']);
            return [
                ProductAddedEvent::class => 'addHandler',
                Registered::class => 'registeredHandler'
            ];
        }

    }