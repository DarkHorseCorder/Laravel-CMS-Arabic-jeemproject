<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Collection;

class HasManyJson extends HasMany
{
    public function addEagerConstraints(array $models)
    {
        $this->query->whereIn($this->foreignKey, $this->getKeys($models, $this->localKey));
    }

    protected function getKeys(array $models, $key = null)
    {
        $keys = [];
        collect($models)->each(function ($value) use ($key, &$keys) {
            $keys = array_merge($keys, json_decode($value->getAttribute($key), true));
        });
        return array_unique($keys);
    }


    public function matchMany(array $models, Collection $results, $relation)
    {

        $foreign = $this->getForeignKeyName();

        $dictionary = $results->mapToDictionary(function ($result) use ($foreign) {
            return [$result->{$foreign} => $result];
        })->all();

        foreach ($models as $model) {
            $ids = json_decode($model->getAttribute($this->localKey), true);
            $collection = collect();
            foreach($ids as $id) {
                if(isSet($dictionary[$id]))
                    $collection = $collection->merge($this->getRelationValue($dictionary, $id, 'many'));
            }
            $model->setRelation($relation, $collection);
        }

        return $models;
    }
}

