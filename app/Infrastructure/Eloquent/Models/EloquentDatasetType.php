<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EloquentDatasetType extends Model
{
    use HasFactory;

    protected $table = 'dataset_types';

    protected $fillable = [
        'name',
        'slug',
        'description',
    ];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(EloquentModel::class, 'model_dataset_type');
    }
}
