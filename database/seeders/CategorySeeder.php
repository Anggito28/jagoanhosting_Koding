<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create([
            'name' => 'Lunas',
        ]);
        \App\Models\Category::create([
            'name' => 'Belum Lunas',
        ]);
    }
}
