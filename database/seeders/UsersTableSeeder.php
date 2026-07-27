<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        // Insert-only: never wipe or overwrite live accounts when re-seeding.
        \DB::table('users')->upsert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'sachin kavindu',
                'email' => 'bestkavindu@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$.vZgwn7y.wQFri5MJ9fr4enqcJ/XUF.lMAQoQ3tpd4gqD57BpMILS',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'created_at' => '2026-07-23 17:59:35',
                'updated_at' => '2026-07-23 17:59:35',
            ),
        ), ['email'], []);

        $this->syncSequence('users');
    }

    /**
     * Explicit ids leave the Postgres identity sequence behind, so the next
     * application insert would collide on the primary key.
     */
    protected function syncSequence(string $table): void
    {
        if (\DB::connection()->getDriverName() !== 'pgsql') {
            return;
        }

        \DB::statement(
            "SELECT setval(pg_get_serial_sequence('{$table}', 'id'), GREATEST((SELECT MAX(id) FROM {$table}), 1))"
        );
    }
}