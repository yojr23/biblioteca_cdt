<?php

declare(strict_types=1);

namespace App\Infrastructure\Eloquent\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EloquentSector extends Model
{
    use HasFactory;

    protected $table = 'sectors';

    protected $fillable = [
        'name',
        'slug',
        'color_code',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function models(): HasMany
    {
        return $this->hasMany(EloquentModel::class, 'sector_id');
    }
}
