<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloquentModelView extends Model
{
    protected $table = 'model_views';

    protected $fillable = [
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

    public function model(): BelongsTo
    {
        return $this->belongsTo(EloquentModel::class, 'model_id');
    }
}
