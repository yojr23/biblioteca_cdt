<?php

declare(strict_types=1);

namespace App\Events;

use App\Infrastructure\Eloquent\Models\EloquentModel;
use App\Models\User;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ModelViewedEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * @param array<string, mixed> $meta
     */
    public function __construct(
        public readonly EloquentModel $model,
        public readonly ?User $user = null,
        public readonly array $meta = [],
    ) {}
}
