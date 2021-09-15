<?php

namespace Database\Factories;

use App\Models\Inventory;
use Illuminate\Database\Eloquent\Factories\Factory;

class InventoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inventory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'category' => $this->faker->randomElement(['Boots','Misc','Fastners']),
            'desc' => $this->faker->words(3, true),
            'quantity' => $this->faker->numberBetween(50,100),
            'low'=> 20,
            'ppu' => $this->faker->randomFloat(2,100,0)

        ];
    }
}
