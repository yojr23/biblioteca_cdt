<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\ResourceViewedEvent;
use App\Services\AnalyticsService;

class RegisterResourceView
{
    public function __construct(private readonly AnalyticsService $analytics)
    {
    }

    public function handle(ResourceViewedEvent $event): void
    {
        $this->analytics->registerResourceView($event->resource, $event->user, $event->meta);
    }
}
