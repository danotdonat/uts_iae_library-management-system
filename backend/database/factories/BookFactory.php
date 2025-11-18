<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'judul' => fake()->sentence(3), // Judul acak 3 kata
        'pengarang' => fake()->name(),
        'penerbit' => fake()->company(),
        'tahun_terbit' => fake()->year(),
        'jumlah_halaman' => fake()->numberBetween(100, 800),
        'isbn' => fake()->isbn13(),
        'kategori' => fake()->randomElement(['Fiksi', 'Non-Fiksi', 'Sains', 'Teknologi', 'Komik']),
        'status' => fake()->randomElement(['Tersedia', 'Dipinjam']),
    ];
}
}
