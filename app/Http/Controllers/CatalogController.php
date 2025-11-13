<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\ValueObjects\AvailabilityOption;
use App\Infrastructure\Eloquent\Models\EloquentDatasetType;
use App\Infrastructure\Eloquent\Models\EloquentTag;
use App\Infrastructure\Eloquent\Models\EloquentTechnologyType;
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
        $prospectiveOptions = [
            ['label' => 'IA', 'value' => 'ia'],
            ['label' => 'IoT', 'value' => 'iot'],
        ];

        return view('catalog.index', [
            'models' => $cards,
            'paginator' => $paginator,
            'filters' => $filterState,
            'sectors' => $this->sectorRepository->all(),
            'technologyTypes' => EloquentTechnologyType::query()->orderBy('name')->get(),
            'datasetTypes' => EloquentDatasetType::query()->orderBy('name')->get(),
            'tags' => EloquentTag::query()->orderBy('name')->get(),
            'availabilityOptions' => AvailabilityOption::cases(),
            'prospectiveOptions' => $prospectiveOptions,
        ]);
    }
}
