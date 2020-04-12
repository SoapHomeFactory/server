<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use App\Recipe;
use DatabaseSeeder;

class RecipeTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();
        $this->seed(DatabaseSeeder::class);
    }

    public function testgettingAllRecipes()
    {
        $recipes = factory(Recipe::class, 10)->create();

        $response = $this->get('/api/recipes');

        $response->assertStatus(200);
        $this->assertEquals(count(json_decode($response->getContent())), 10);
    }

    public function testGettingASpecificRecipe()
    {
        $recipes = factory(Recipe::class, 5)->create();

        $response = $this->get('/api/recipes/2');

        $response->assertStatus(200);
        $this->assertNotEmpty($response->getContent());
    }

    public function testCreatingANewRecipe()
    {
        $payload = [
          'recipe' => 'My new recipe',
          'ingredients' => [
            [
              'weight' => 500,
              'type' => 'lye',
              'details' => [
                'name' => 'hydroxyde de sodium'
              ]
            ],
            [
              'weight' => 500,
              'type' => 'water',
              'details' => [
                'name' => 'ordinaire'
              ]
            ],
            [
              'weight' => 500,
              'type' => 'fat',
              'details' => [
                'name' => "Huile d'olive",
                'type' => 1
              ]
            ]

          ],
        ];

        $response = $this->post('/api/recipes', $payload);

        $response->assertStatus(200);

        $this->assertDatabaseHas('recipes', [
          'name' => $payload['recipe']
        ]);

        $this->assertDatabaseHas('ingredients', [
          'weight' => $payload["ingredients"][1]['weight'],
          'cookable_id' => 2,
          'cookable_type' => 'App\Water'
        ]);
    }

    public function testDeletingARecipe()
    {
        $recipes = factory(Recipe::class, 2)->create();

        $response = $this->delete('/api/recipes/1');

        $response->assertStatus(200);
        $this->assertDatabaseMissing('recipes', [
          'id' => 1
        ]);
    }
}
