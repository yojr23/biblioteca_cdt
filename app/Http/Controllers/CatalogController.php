<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Infrastructure\Repositories\EloquentSectorRepository;
use App\Services\ModelSearchService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CatalogController extends Controller
{
    public function __construct(
        private readonly ModelSearchService $modelSearchService,
        private readonly EloquentSectorRepository $sectorRepository,
    ) {}

    public function index(Request $request): View
    {
        $filterState = $this->modelSearchService->buildFilterState($request->all());
        $paginator = $this->modelSearchService->search($filterState);
        $cards = $this->modelSearchService->cardsFromResult($paginator);

        return view('catalog.index', [
            'models' => $cards,
            'paginator' => $paginator,
            'filters' => $filterState,
            'sectors' => $this->sectorRepository->all(),
        ]);
    }
}
