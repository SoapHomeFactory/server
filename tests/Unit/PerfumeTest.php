<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Perfume;
use PerfumeTypeSeeder;
use App\Recipe;

class PerfumeTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatingANewPerfume()
    {
        $this->seed(PerfumeTypeSeeder::class);
        $perfume = factory(Perfume::class)->create();

        $this->assertDatabaseHas('perfumes', $perfume->toArray());
    }

    public function testDeletingAPerfume()
    {
        $this->seed(PerfumeTypeSeeder::class);
        $perfume = factory(Perfume::class)->create();

        $perfume->delete();

        $this->assertDeleted('perfumes', $perfume->toArray());
    }

    public function testCreatingAnIngredient()
    {
        $this->seed(PerfumeTypeSeeder::class);
        $perfume = factory(Perfume::class)->create();

        $recipe = factory(Recipe::class)->create();
        $ing = $perfume->cookable()->create([
          'recipe_id' => $recipe->id,
          'weight' => 500
        ]);

        $this->assertDatabaseHas('ingredients', $ing->toArray());
    }
}
