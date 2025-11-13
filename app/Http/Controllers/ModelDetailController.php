<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Infrastructure\Eloquent\Models\EloquentModel;
use App\Services\AuthorizationService;
use App\Services\ResourceEmbedService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModelDetailController extends Controller
{
    public function __construct(
        private readonly AuthorizationService $authorizationService,
        private readonly ResourceEmbedService $resourceEmbedService,
    ) {}

    public function show(Request $request, string $slug): View
    {
        $model = EloquentModel::query()
            ->with([
                'sector',
                'tags',
                'technologyTypes',
                'datasetTypes',
                'resources',
            ])
            ->where('slug', $slug)
            ->firstOrFail();

        if (! $this->authorizationService->canViewModel($request->user(), $model)) {
            abort(403);
        }

        $resourceEmbeds = $model->resources
            ->map(fn ($resource) => $this->resourceEmbedService->build($resource, $request->user()))
            ->all();

        return view('catalog.show', [
            'model' => $model,
            'resourceEmbeds' => $resourceEmbeds,
            'canViewRestricted' => $this->authorizationService->canViewRestrictedResources($request->user()),
        ]);
    }
}
