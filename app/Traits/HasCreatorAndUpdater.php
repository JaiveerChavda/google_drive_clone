<?php

namespace App\Traits;

trait HasCreatorAndUpdater
{
    protected static function bootHasCreatorAndUpdater()
    {
        static::creating(function($model) {
            $model->created_by = auth()->id();
            $model->updated_by = auth()->id();
        });

        static::updating(function($model) {
            $model->updated_by = auth()->id();
        });
    }
}
