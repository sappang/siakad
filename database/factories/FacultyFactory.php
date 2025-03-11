<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Faculty>
 */
class FacultyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $name=$this->faker->unique()->randomElement([
                'Fakultas Ilmu Komputer',
                'Fakultas Ilmu Kesehatan',
                
            ]),
            'slug' => str()->slug($name),
            'code' => str()->random(6),

        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($faculty){
            $departments =match($faculty->name){
                'Fakultas Ilmu Komputer' => [
                    ['name'=>$name = 'Department of Computer Science', 'slug'=>str()->slug($name), 'code'=>str()->random(6)],
                    ['name'=>$name = 'Department of Information System', 'slug'=>str()->slug($name), 'code'=>str()->random(6)],               
                ],
                'Fakultas Ilmu Kesehatan' => [
                    ['name'=>$name = 'Profesi Ners', 'slug'=>str()->slug($name), 'code'=>str()->random(6)],
                    ['name'=>$name = 'Profesi Bidan', 'slug'=>str()->slug($name), 'code'=>str()->random(6)],               
                ],
                default => [],
            };

            foreach ($departments as $department) {
            $faculty->departments()->create([
                    'name' => $department['name'],
                    'slug' => $department['slug'],
                    'code' => $department['code'],
            ]);
        }
        });

        
    }
}
