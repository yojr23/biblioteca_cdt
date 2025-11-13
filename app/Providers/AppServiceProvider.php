<?php

namespace App\Providers;

use App\Domain\Interfaces\ModelSearchRepositoryInterface;
use App\Infrastructure\Repositories\EloquentModelRepository;
use App\Services\AuthorizationService;
use App\Services\Decorators\RestrictedResourceDecorator;
use App\Services\EmbedStrategies\InternalDemoEmbedStrategy;
use App\Services\EmbedStrategies\PDFJSEmbedStrategy;
use App\Services\EmbedStrategies\YouTubeEmbedStrategy;
use App\Services\FilterOrchestrator;
use App\Services\ResourceEmbedService;
use App\Services\Strategies\AvailabilityFilterStrategy;
use App\Services\Strategies\DatasetTypeFilterStrategy;
use App\Services\Strategies\FullTextSearchStrategy;
use App\Services\Strategies\SectorFilterStrategy;
use App\Services\Strategies\TagFilterStrategy;
use App\Services\Strategies\TechnologyTypeFilterStrategy;
use App\Services\Strategies\TRLFilterStrategy;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ModelSearchRepositoryInterface::class, EloquentModelRepository::class);

        $this->app->singleton(AuthorizationService::class);

        $this->app->singleton(FilterOrchestrator::class, function ($app) {
            return new FilterOrchestrator([
                $app->make(SectorFilterStrategy::class),
                $app->make(TechnologyTypeFilterStrategy::class),
                $app->make(DatasetTypeFilterStrategy::class),
                $app->make(AvailabilityFilterStrategy::class),
                $app->make(TRLFilterStrategy::class),
                $app->make(TagFilterStrategy::class),
                $app->make(FullTextSearchStrategy::class),
            ]);
        });

        $this->app->singleton(ResourceEmbedService::class, function ($app) {
            $strategies = [
                $app->make(YouTubeEmbedStrategy::class),
                $app->make(PDFJSEmbedStrategy::class),
                $app->make(InternalDemoEmbedStrategy::class),
            ];

            return new ResourceEmbedService(
                $app->make(AuthorizationService::class),
                $app->make(RestrictedResourceDecorator::class),
                $strategies,
            );
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
