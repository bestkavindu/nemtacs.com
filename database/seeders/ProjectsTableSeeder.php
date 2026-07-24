<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('projects')->delete();
        
        \DB::table('projects')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Smoke Test Board',
                'slug' => 'smoke-test-board',
                'category' => 'Switchboards',
                'description' => 'Temp.',
                'image' => 'projects/Ji0pX15Ivekhc7czRLMZw6DiAlMXYvUJHdB0GhQT.jpg',
                'location' => 'Colombo',
                'is_featured' => 1,
                'active' => 1,
                'created_at' => '2026-07-24 09:08:12',
                'updated_at' => '2026-07-24 10:20:26',
            ),
            1 => 
            array (
                'id' => 2,
                'title' => '4000A Main Distribution Board',
                'slug' => '4000a-main-distribution-board-sekzyb',
                'category' => 'Switchboards',
                'description' => '',
                'image' => NULL,
                'location' => 'Colombo',
                'is_featured' => 0,
                'active' => 1,
                'created_at' => '2026-07-24 09:16:17',
                'updated_at' => '2026-07-24 09:16:17',
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'PLC Automation Upgrade',
                'slug' => 'plc-automation-upgrade-rkt1lt',
                'category' => 'Automation',
                'description' => '',
                'image' => 'projects/36KczZwuXlGPielfQDjA73yGhZAUEya4SnT1RLa3.jpg',
                'location' => 'Gampaha',
                'is_featured' => 1,
                'active' => 1,
                'created_at' => '2026-07-24 09:58:24',
                'updated_at' => '2026-07-24 10:26:08',
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'Standby Generator Installation',
                'slug' => 'standby-generator-installation-lx30u2',
                'category' => 'Manufacturing ',
                'description' => '',
                'image' => 'projects/hzPKhr3IoWyYAPL4MJIav6IRRPbVl6p5hgUwUMhY.png',
                'location' => 'Kandy',
                'is_featured' => 1,
                'active' => 1,
                'created_at' => '2026-07-24 10:19:56',
                'updated_at' => '2026-07-24 10:26:40',
            ),
        ));
        
        
    }
}