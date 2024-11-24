<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('es_CO'); // Faker configurado para Colombia
        $priorities = ['low', 'medium', 'high'];
        $statuses = ['pending', 'in_progress', 'resolved'];
        $types = [
            'derrames quimicos',       // Derrames químicos
            'contaminacion plastica',  // Contaminación plástica
            'fugas residuales',        // Fugas de aguas residuales
            'derrames petroleo',       // Derrames de petróleo
            'residuos industriales',   // Residuos industriales
            'escorrentia agricola'     // Escorrentía agrícola
        ];

        $colombianCities = [
            'Bogotá', 'Medellín', 'Cali', 'Barranquilla', 'Cartagena',
            'Bucaramanga', 'Pereira', 'Manizales', 'Santa Marta', 'Cúcuta'
        ];

        for ($i = 0; $i < 143; $i++) { // Genera 50 registros
            DB::table('reports')->insert([
                'title' => $faker->randomElement(['Derrame químico', 'Fuga residual', 'Contaminación plástica', 'Derrame petróleo', 'Residuos industriales', 'Escorrentía agrícola']),
                'description' => $faker->paragraph(3),
                'location' => $faker->randomElement($colombianCities), // Ciudades colombianas
                'latitude' => $faker->latitude(1.5, 12.5), // Coordenadas de Colombia (aproximado)
                'longitude' => $faker->longitude(-79.0, -66.5), // Coordenadas de Colombia (aproximado)
                'priority' => $faker->randomElement($priorities),
                'type' => $faker->randomElement($types),
                'status' => $faker->randomElement($statuses),
                'photo_path' => $faker->randomElement([null, $faker->imageUrl(640, 480, 'nature', true)]),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-6 months', 'now'),
            ]);
        }
    }
}
