<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Fat;
use FatTypeSeeder;
use App\Recipe;

class FatTest extends TestCase
{
    use RefreshDatabase;

    public function testCreatingANewFat()
    {
        $this->seed(FatTypeSeeder::class);
        $fat = factory(Fat::class)->create();

        $this->assertDatabaseHas('fats', $fat->toArray());
    }

    public function testDeletingAFat()
    {
        $this->seed(FatTypeSeeder::class);
        $fat = factory(Fat::class)->create();

        $fat->delete();

        $this->assertDeleted('fats', $fat->toArray());
    }

    public function testCreatingAnIngredient()
    {
        $this->seed(FatTypeSeeder::class);
        $fat = factory(Fat::class)->create();

        $recipe = factory(Recipe::class)->create();
        $ing = $fat->cookable()->create([
          'recipe_id' => $recipe->id,
          'weight' => 500
        ]);

        $this->assertDatabaseHas('ingredients', $ing->toArray());
    }


}
