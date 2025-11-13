<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ModelViewedEvent;
use App\Services\AnalyticsService;

class RegisterModelView
{
    public function __construct(private readonly AnalyticsService $analytics)
    {
    }

    public function handle(ModelViewedEvent $event): void
    {
        $this->analytics->registerModelView($event->model, $event->user, $event->meta);
    }
}
