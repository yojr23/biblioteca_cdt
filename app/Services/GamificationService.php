<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use Illuminate\Contracts\Cache\Repository as CacheRepository;
use Illuminate\Support\Str;

class GamificationService
{
    public function __construct(private readonly CacheRepository $cache)
    {
    }

    public function recordSectorExploration(User $user, string $sectorSlug): void
    {
        $key = $this->cacheKey($user->id, 'sectors');
        $visited = collect($this->cache->get($key, []))
            ->push($sectorSlug)
            ->unique()
            ->values()
            ->all();

        $this->cache->put($key, $visited, now()->addDays(7));
    }

    public function badgesFor(User $user): array
    {
        $sectors = $this->cache->get($this->cacheKey($user->id, 'sectors'), []);

        return match (count($sectors)) {
            0 => [],
            1 => ['Explorador Inicial'],
            3 => ['Explorador Multisector'],
            default => ['Explorador Activo'],
        };
    }

    private function cacheKey(int $userId, string $suffix): string
    {
        return sprintf('user:%d:gamification:%s', $userId, Str::slug($suffix));
    }
}
