<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Setting>
 */
class SettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bname' => 'Laravel',
            'email' => 'admin@example',
            'phone' => '+91 98989 98989',
            'phone' => '+91 98989 98989',
            'site_title' => 'W3 School Clone',
        ];
    }
}
