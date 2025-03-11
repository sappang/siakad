<?php

namespace Database\Seeders;

use App\Models\FeeGroup;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeeGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FeeGroup::factory()->count(10)->create();
    }
}
