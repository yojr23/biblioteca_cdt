<?php

declare(strict_types=1);

namespace App\Providers;

use App\Events\ModelViewedEvent;
use App\Events\ResourceViewedEvent;
use App\Listeners\RegisterModelView;
use App\Listeners\RegisterResourceView;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        ModelViewedEvent::class => [
            RegisterModelView::class,
        ],
        ResourceViewedEvent::class => [
            RegisterResourceView::class,
        ],
    ];

    public function boot(): void
    {
        parent::boot();
    }
}
