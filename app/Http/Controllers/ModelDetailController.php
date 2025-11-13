<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\ModelViewedEvent;
use App\Infrastructure\Eloquent\Models\EloquentModel;
use App\Services\AuthorizationService;
use App\Services\GamificationService;
use App\Services\ModelDetailService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ModelDetailController extends Controller
{
    public function __construct(
        private readonly AuthorizationService $authorizationService,
        private readonly ModelDetailService $modelDetailService,
        private readonly GamificationService $gamificationService,
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

        event(new ModelViewedEvent(
            model: $model,
            user: $request->user(),
            meta: [
                'session_id' => $request->session()->getId(),
                'source' => 'catalog-detail',
                'ip_address' => $request->ip(),
            ],
        ));

        if ($request->user()) {
            $this->gamificationService->recordSectorExploration($request->user(), $model->sector?->slug ?? 'sin-sector');
        }

        $detailDto = $this->modelDetailService->toDto($model, $request->user());
        $badges = $request->user() ? $this->gamificationService->badgesFor($request->user()) : [];

        return view('catalog.show', [
            'model' => $detailDto,
            'canViewRestricted' => $this->authorizationService->canViewRestrictedResources($request->user()),
            'badges' => $badges,
        ]);
    }
}
