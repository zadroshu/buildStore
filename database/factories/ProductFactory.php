<?php

  namespace Database\Factories;

  use Illuminate\Database\Eloquent\Factories\Factory;

  /**
   * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Good>
   */
  class ProductFactory extends Factory
  {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
      return [
        'name' => $this->faker->name,
        'category' => $this->faker->numberBetween(0, 3),
        'cost' => $this->faker->numberBetween(500, 11301),
        'discount' => $this->faker->numberBetween(0, 1000),
        'description' => $this->faker->text(150),
        'images' => $this->faker->url(),
        'in_stock' => $this->faker->numberBetween(0, 1000),
      ];
    }
  }
