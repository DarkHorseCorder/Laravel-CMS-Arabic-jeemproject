<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Support\Facades\Log;

    trait TransactionalEloquentEvents
    {
        protected static $eloquentEvents = ['created', 'updated'];

        protected static $queuedTransactionalEvents = [];

        public static function bootTransactionalEloquentEvents()
        {
            $dispatcher = static::getEventDispatcher();
            if (!$dispatcher) {
                return;
            }

            foreach (self::$eloquentEvents as $event) {
                static::registerModelEvent($event, function (Model $model) use ($event) {
                    /*get updated parameters*/
                    $updatedParams = array_diff($model->getOriginal(),$model->getAttributes());
                    if ($model->getConnection()->transactionLevel()) {
                        self::$queuedTransactionalEvents[$event][] = $model;
                    } else {
                        Log::info('Event fired without transaction '.$event. json_encode($updatedParams));
                        /* Do your operation here*/
                    }
                });
            }

            $dispatcher->listen(TransactionCommitted::class, function (TransactionCommitted $event) {
                if ($event->connection->transactionLevel() > 0) {
                    return;
                }
                foreach ((self::$queuedTransactionalEvents ?? []) as $eventName => $models) {
                    foreach ($models as $model) {
                        Log::info('Event fired with transaction '.$eventName);
                        /* Do your operation here*/
                    }
                }
                self::$queuedTransactionalEvents = [];
            });
        }
    }
