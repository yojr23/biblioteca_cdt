<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EloquentResource extends Model
{
    use HasFactory;

    protected $table = 'resources';

    protected $fillable = [
        'title',
        'type',
        'provider',
        'url',
        'storage_path',
        'requires_auth',
        'meta',
    ];

    protected $casts = [
        'requires_auth' => 'boolean',
        'meta' => 'array',
    ];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(EloquentModel::class, 'model_resource')
            ->withPivot(['visibility', 'display_order'])
            ->orderBy('model_resource.display_order');
    }
}
