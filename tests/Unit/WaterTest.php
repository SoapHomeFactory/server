<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

use WaterSeeder;
use App\Water;
use App\Recipe;

class WaterTest extends TestCase
{
    use RefreshDatabase;

    public function testRunningWaterSeeder()
    {
        $this->seed(WaterSeeder::class);

        $this->assertDatabaseHas('waters', [
          'name' => 'ordinaire'
        ]);

        $this->assertDatabaseHas('waters', [
          'name' => 'déminéralisée'
        ]);
    }

    public function testCreatingAnIngredient()
    {
        $this->seed(WaterSeeder::class);
        $water = Water::find(1);

        $recipe = factory(Recipe::class)->create();
        $ing = $water->cookable()->create([
          'recipe_id' => $recipe->id,
          'weight' => 500
        ]);

        $this->assertDatabaseHas('ingredients', $ing->toArray());
    }
}
