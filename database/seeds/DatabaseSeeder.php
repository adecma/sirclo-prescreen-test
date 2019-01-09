<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect($this->data())->each(function($class) {
            $this->call($class);
        });
    }

    private function data()
    {
        $data = [
            BeratSeeder::class,
        ];

        return $data;
    }
}
