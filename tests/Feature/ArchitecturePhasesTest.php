<?php

namespace Tests\Feature;

use App\Domain\DTOs\ModelCardDTO;
use App\Domain\DTOs\FilterStateDTO;
use App\Domain\Interfaces\ModelSearchRepositoryInterface;
use App\Domain\ValueObjects\AvailabilityOption;
use App\Domain\ValueObjects\ColorCode;
use App\Domain\ValueObjects\Slug;
use App\Domain\ValueObjects\TRLLevel;
use App\Events\ModelViewedEvent;
use App\Infrastructure\Eloquent\Models\EloquentModel;
use App\Infrastructure\Eloquent\Models\EloquentResource;
use App\Infrastructure\Repositories\EloquentModelRepository;
use App\Services\AuthorizationService;
use App\Services\FilterOrchestrator;
use App\Services\ResourceEmbedService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class ArchitecturePhasesTest extends TestCase
{
    use RefreshDatabase;

    public function test_phase_one_domain_components_behave(): void
    {
        $trl = TRLLevel::fromInt(5);
        $this->assertSame(5, $trl->value());

        $color = ColorCode::fromString('#00AAFF');
        $this->assertSame('#00AAFF', (string) $color);

        $dto = new ModelCardDTO(
            id: 1,
            title: 'Demo',
            slug: Slug::fromString('demo'),
            shortDescription: 'Desc',
            sectorName: 'Agro',
            sectorColor: $color,
            trlLevel: $trl,
            availabilityOptions: [AvailabilityOption::VIDEO],
        );

        $this->assertSame('Demo', $dto->title);
        $this->assertTrue(Schema::hasTable('models'));
    }

    public function test_phase_two_infrastructure_and_auth(): void
    {
        $repository = app(ModelSearchRepositoryInterface::class);
        $this->assertInstanceOf(EloquentModelRepository::class, $repository);

        $permission = Permission::create(['name' => AuthorizationService::PERMISSION_VIEW_RESTRICTED, 'guard_name' => 'web']);
        $role = Role::create(['name' => AuthorizationService::ROLE_VISITOR, 'guard_name' => 'web']);
        $role->givePermissionTo($permission);

        $user = \App\Models\User::factory()->create();
        $user->assignRole($role);

        $service = app(AuthorizationService::class);
        $this->assertTrue($service->canViewRestrictedResources($user));
    }

    public function test_phase_three_filter_system_runs_pipeline(): void
    {
        $state = new FilterStateDTO(
            sectorId: 1,
            technologyTypeIds: [2],
            datasetTypeIds: [3],
            tagIds: [4],
            availabilityOptions: [AvailabilityOption::VIDEO],
            prospectiveModes: ['ia'],
            trlMin: 3,
            trlMax: 7,
            search: 'demo',
        );

        $query = app(ModelSearchRepositoryInterface::class)->baseQuery();
        $builder = app(FilterOrchestrator::class)->apply($query, $state);

        $this->assertStringContainsString('"sector_id"', $builder->toSql());
    }

    public function test_phase_four_services_and_events(): void
    {
        $resource = new EloquentResource([
            'title' => 'Video',
            'type' => 'video',
            'provider' => 'youtube',
            'url' => 'https://youtu.be/demo',
            'requires_auth' => true,
        ]);
        $resource->setAttribute('id', 1);

        $embed = app(ResourceEmbedService::class)->build($resource, null);
        $this->assertTrue($embed->isBlurred);

        $sectorId = DB::table('sectors')->insertGetId(['name' => 'Agro', 'slug' => 'agro', 'color_code' => '#008080']);
        $modelId = DB::table('models')->insertGetId([
            'sector_id' => $sectorId,
            'title' => 'Modelo Test',
            'slug' => 'modelo-test',
            'short_description' => 'Desc',
            'long_description_public' => 'Public desc',
            'trl_level' => 4,
            'availability_flags' => json_encode(['video']),
            'status' => 'published',
        ]);

        $model = EloquentModel::find($modelId);
        event(new ModelViewedEvent($model, null, ['session_id' => 'test-session']));

        $this->assertDatabaseHas('model_views', [
            'model_id' => $modelId,
            'session_id' => 'test-session',
        ]);
    }
}
