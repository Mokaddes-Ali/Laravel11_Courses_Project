<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Topic;
use App\Models\Series;
use App\Models\Platform;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $series = ['PHP', 'JS', 'CSS', 'HTML', 'LARAVEL'];
        foreach ($series as $name) {
            Series::create([
                'name' => $name,
            ]);

            $topics =[ 'Eloquent', 'Notifications', 'Upgrading',
            'Contributions', 'Appendix'];
            foreach ($topics as $name) {
                Topic::create([
                    'name' => $name,
                ]);

                $platform = ['Udemy', 'Coursera',
                'Pluralsight', 'LinkedIn', 'Skillshare'];
                foreach ($platform as $name) {
                    Platform::create([
                        'name' => $name,
                    ]);
                }
            }
        }
    }
}
