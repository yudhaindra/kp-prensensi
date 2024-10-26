<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JobdescSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProjectManagerSeeder::class);
        $this->call(WaktuKerjaSeeder::class);
        $this->call(AbsensiSeeder::class);
        $this->call(LemburSeeder::class);
        $this->call(UserHasMadeBySeeder::class);
        $this->call(IzinSeeder::class);
    }
}
