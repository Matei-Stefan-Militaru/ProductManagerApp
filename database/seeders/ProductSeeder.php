<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Product::factory()->count(50)->create();
         
        DB::table('products')->insert([
            [
                'name' => 'Producto 1',        // Asegúrate de usar 'name' en lugar de 'nombre'
                'description' => 'Descripción del Producto 1', // Usa 'description' en lugar de 'descripcion'
                'price' => 100,  // Usa 'price' en lugar de 'precio'
            ],
            [
                'name' => 'Producto 2',
                'description' => 'Descripción del Producto 2',
                'price' => 150,
            ],
            [
                'name' => 'Producto 3',
                'description' => 'Descripción del Producto 3',
                'price' => 200,
            ]
        ]);
    }
}
