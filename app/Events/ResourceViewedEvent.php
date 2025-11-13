<?php

declare(strict_types=1);

namespace App\Events;

use App\Infrastructure\Eloquent\Models\EloquentResource;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ResourceViewedEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * @param array<string, mixed> $meta
     */
    public function __construct(
        public readonly EloquentResource $resource,
        public readonly ?User $user = null,
        public readonly array $meta = [],
    ) {}
}
