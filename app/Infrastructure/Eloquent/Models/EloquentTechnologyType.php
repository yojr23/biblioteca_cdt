<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class EloquentTechnologyType extends Model
{
    use HasFactory;

    protected $table = 'technology_types';

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    public function models(): BelongsToMany
    {
        return $this->belongsToMany(EloquentModel::class, 'model_technology_type');
    }
}
