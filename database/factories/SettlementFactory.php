<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settlement>
 */
class SettlementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "key" => 467,
            "name" => '"Aguascalientes (Lic. Jesús Terán Peredo)"',
            "settlement_type_id" => 1,
            "zone_type" => 'Rural'
        ];
    }
}
