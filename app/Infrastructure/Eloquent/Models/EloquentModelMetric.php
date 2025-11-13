<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class EloquentModelMetric extends Model
{
    protected $table = 'model_metrics';

    protected $fillable = [
        'model_id',
        'views_total',
        'views_last_30d',
        'demo_clicks',
        'video_clicks',
    ];

    public function model(): BelongsTo
    {
        return $this->belongsTo(EloquentModel::class, 'model_id');
    }
}
