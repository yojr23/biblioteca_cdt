<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Infrastructure\Repositories\EloquentSectorRepository;
use App\Services\ModelHighlightService;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct(
        private readonly ModelHighlightService $highlightService,
        private readonly EloquentSectorRepository $sectorRepository,
    ) {}

    public function index(): View
    {
        $highlights = $this->highlightService->highlighted(6);
        $sectors = $this->sectorRepository->all();

        return view('home.index', [
            'highlights' => $highlights,
            'sectors' => $sectors,
        ]);
    }
}
