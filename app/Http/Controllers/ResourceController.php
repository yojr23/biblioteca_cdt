<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Events\ResourceViewedEvent;
use App\Infrastructure\Eloquent\Models\EloquentResource;
use App\Services\AuthorizationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ResourceController extends Controller
{
    public function __construct(private readonly AuthorizationService $authorizationService)
    {
    }

    public function open(Request $request, int $resource): RedirectResponse
    {
        $resourceModel = EloquentResource::query()->findOrFail($resource);

        if ($resourceModel->requires_auth && ! $this->authorizationService->canViewRestrictedResources($request->user())) {
            return Redirect::route('login')->with('status', 'Inicia sesión para acceder a este recurso.');
        }

        event(new ResourceViewedEvent(
            resource: $resourceModel,
            user: $request->user(),
            meta: [
                'session_id' => $request->session()->getId(),
                'source' => 'resource-open',
                'ip_address' => $request->ip(),
                'model_id' => $request->integer('model'),
            ],
        ));

        $target = $resourceModel->url ?? $resourceModel->storage_path;

        if (! $target) {
            abort(404, 'El recurso no cuenta con un destino disponible.');
        }

        return Redirect::away($target);
    }
}
