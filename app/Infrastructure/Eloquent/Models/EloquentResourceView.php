<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloquentResourceView extends Model
{
    protected $table = 'resource_views';

    protected $fillable = [
        'resource_id',
        'model_id',
        'user_id',
        'session_id',
        'source',
        'ip_address',
        'meta',
    ];

    protected $casts = [
        'meta' => 'array',
    ];

    public function resource(): BelongsTo
    {
        return $this->belongsTo(EloquentResource::class, 'resource_id');
    }
}
