<?php

namespace App\Models;

use App\Traits\HasCreatorAndUpdater;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Support\Str;

class File extends Model
{
    use HasFactory,SoftDeletes,NodeTrait,HasCreatorAndUpdater;

    private function isOwnedByAuthUser($userID): bool
    {
        return $this->created_by = $userID;
    }

    public function parent() : BelongsTo
    {
        return $this->belongsTo(File::class,'parent_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if(!$model->parent){
                return;
            }

            $model->path = (!$model->parent->isRoot() ? $model->parent->path . '/' : '') . Str::slug($model->name);
        });
    }
}
