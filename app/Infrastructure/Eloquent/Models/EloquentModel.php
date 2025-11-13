<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as BaseModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class EloquentModel extends BaseModel
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'models';

    protected $guarded = [];

    protected $casts = [
        'availability_flags' => 'array',
        'is_kit' => 'boolean',
        'is_highlighted' => 'boolean',
        'published_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public function sector(): BelongsTo
    {
        return $this->belongsTo(EloquentSector::class, 'sector_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(EloquentTag::class, 'model_tag');
    }

    public function technologyTypes(): BelongsToMany
    {
        return $this->belongsToMany(EloquentTechnologyType::class, 'model_technology_type');
    }

    public function datasetTypes(): BelongsToMany
    {
        return $this->belongsToMany(EloquentDatasetType::class, 'model_dataset_type');
    }

    public function resources(): BelongsToMany
    {
        return $this->belongsToMany(EloquentResource::class, 'model_resource')
            ->withPivot(['visibility', 'display_order'])
            ->orderBy('model_resource.display_order');
    }

    public function metrics(): HasOne
    {
        return $this->hasOne(EloquentModelMetric::class, 'model_id');
    }

    public function views(): HasMany
    {
        return $this->hasMany(EloquentModelView::class, 'model_id');
    }
}
