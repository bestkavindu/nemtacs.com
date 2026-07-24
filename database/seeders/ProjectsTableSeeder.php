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
                'description' => 'Design, assembly and factory testing of a type-tested low-voltage distribution board for a commercial facility in Colombo. Built with world-reputed switchgear on our quality-controlled floor and fully routine-tested before dispatch.',
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
                'description' => 'Supply and installation of a 4000A type-tested main distribution board for a large industrial plant. Engineered in-house from single-line drawings through to assembly, delivering reliable power distribution rated to our full 4000A capability.',
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
                'description' => 'Upgrade of an existing production line with modern PLC-based control for safer, more efficient operation. The project improved line uptime and gave the client precise, centralised control over the process.',
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
                'description' => 'Supply, installation and commissioning of a standby generator with automatic transfer switching for a facility in Kandy. Delivers seamless backup power during outages, backed by our 24/7 breakdown response and servicing.',
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