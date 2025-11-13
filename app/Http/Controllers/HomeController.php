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
        $highlighted = $this->highlightService->highlighted(6);
        $carouselSlides = collect($highlighted)
            ->take(5)
            ->map(fn ($card) => [
                'title' => $card->title,
                'sector' => $card->sectorName,
                'description' => $card->shortDescription,
                'trl' => $card->trlLevel->value(),
                'slug' => (string) $card->slug,
            ])
            ->values()
            ->all();

        $organization = [
            'mission' => 'Diseñar y desarrollar proyectos de CTeI y tecnologías 4.0 que articulen Sociedad, Estado, Empresa y Academia para generar valor sostenible en territorios inteligentes.',
            'vision' => 'Ser el referente tecnológico en el oriente colombiano para el desarrollo y transferencia de tecnologías 4.0.',
            'objectives' => [
                'Impulsar territorios inteligentes mediante investigación aplicada e innovación.',
                'Facilitar servicios tecnológicos que habiliten Industria 4.0 en el tejido empresarial.',
                'Formar talento especializado que acelere la transformación digital regional.',
                'Articular alianzas entre universidad, empresa, estado y sociedad.',
            ],
        ];

        return view('home.index', [
            'carouselSlides' => $carouselSlides,
            'highlights' => $highlighted,
            'mostViewed' => $this->highlightService->mostViewed(4),
            'sectors' => $this->sectorRepository->allWithModelCounts(),
            'organization' => $organization,
        ]);
    }
}
