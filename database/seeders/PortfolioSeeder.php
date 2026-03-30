<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Tool;
use App\Models\Project;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        /* ── Tools (arc carousel) ── */
        $toolsData = [
            ['name' => 'Illustrator',  'slug' => 'ai',      'sort_order' => 1],
            ['name' => 'Photoshop',    'slug' => 'ps',      'sort_order' => 2],
            ['name' => 'Blender',      'slug' => 'blender', 'sort_order' => 3],
            ['name' => 'After Effects','slug' => 'ae',      'sort_order' => 4],
            ['name' => 'Figma',        'slug' => 'figma',   'sort_order' => 5],
        ];

        foreach ($toolsData as $td) {
            Tool::firstOrCreate(['slug' => $td['slug']], $td);
        }

        /* ── Experience ── */
        Experience::firstOrCreate(
            ['company' => 'TeraMed Technologies'],
            [
                'job_title'   => 'Laravel Developer (ERP Specialist)',
                'period'      => 'March 2026 — Present',
                'description' => 'Leading the development of RMD ERP (CEASER), a massive enterprise resource planning system using Laravel 12 and PHP 8.2.',
                'highlights'  => [
                    ['item' => 'Architected complex modules: Inventory Management, Expense Claims, and Travel Requests.'],
                    ['item' => 'Implemented high-performance notification systems using Redis and MariaDB.'],
                    ['item' => 'Developed automated stock deduction (FEFO) and real-time inventory movement tracking.'],
                ],
                'badges'      => ['Laravel 12', 'PHP 8.2', 'Redis', 'MariaDB', 'Vite'],
                'is_current'  => true,
                'sort_order'  => 1,
            ]
        );

        $this->command->info('Portfolio seeded! Upload images via the Filament admin panel.');
        $this->command->info('Visit: /admin  →  Tools  →  Edit each tool to upload icons & project images.');
    }
}
