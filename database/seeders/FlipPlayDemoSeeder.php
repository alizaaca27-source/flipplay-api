<?php

namespace Database\Seeders;

use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;

class FlipPlayDemoSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::firstOrCreate(
            ['email' => 'demo@flipplay.test'],
            [
                'name' => 'Demo User',
                'password' => 'password123',
            ]
        );

        $mediaItems = [
            [
                'title' => 'Interstellar',
                'type' => 'movie',
                'description' => 'A science fiction film about space exploration.',
                'release_year' => 2014,
            ],
            [
                'title' => 'Spirited Away',
                'type' => 'movie',
                'description' => 'An animated fantasy film.',
                'release_year' => 2001,
            ],
            [
                'title' => 'Attack on Titan',
                'type' => 'series',
                'description' => 'A series about humanity and giant titans.',
                'release_year' => 2013,
            ],
        ];

        foreach ($mediaItems as $item) {
            Media::firstOrCreate(
                ['title' => $item['title']],
                $item
            );
        }

        $this->command->info('FlipPlay demo data created successfully.');
    }
}
