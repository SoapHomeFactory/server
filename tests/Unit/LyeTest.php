<?php

namespace Tests\Unit;

use Tests\TestCase;

use Illuminate\Foundation\Testing\RefreshDatabase;

use LyeSeeder;
use App\Lye;
use App\Recipe;

class LyeTest extends TestCase
{
    use RefreshDatabase;

    public function testRunningLyeSeeder()
    {
        $this->seed(LyeSeeder::class);

        $this->assertDatabaseHas('lyes', [
          'name' => 'hydroxyde de sodium',
        ]);

        $this->assertDatabaseHas('lyes', [
          'name' => 'hydroxyde de potassium',
        ]);

        $this->assertDatabaseHas('lyes', [
          'name' => 'lessive de soude',
        ]);
    }

    public function testCreatingAnIngredient()
    {
        $this->seed(LyeSeeder::class);
        $lye = Lye::find(1);

        $recipe = factory(Recipe::class)->create();
        $ing = $lye->cookable()->create([
          'recipe_id' => $recipe->id,
          'weight' => 500
        ]);

        $this->assertDatabaseHas('ingredients', $ing->toArray());
    }
}
