<?php

use Illuminate\Database\Seeder;
use App\Berat;

class BeratSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Berat::unguard();
        
        collect($this->data())->each(function($data) {
            Berat::create($data);
        });

        Berat::reguard();
    }

    private function data()
    {
        $data = [
            [
                'tanggal' => '2018-08-18',
                'max' => 50,
                'min' => 48,
            ],
            [
                'tanggal' => '2018-08-19',
                'max' => 51,
                'min' => 50,
            ],
            [
                'tanggal' => '2018-08-20',
                'max' => 52,
                'min' => 50,
            ],
            [
                'tanggal' => '2018-08-21',
                'max' => 49,
                'min' => 49,
            ],
            [
                'tanggal' => '2018-08-22',
                'max' => 50,
                'min' => 49,
            ],
        ];

        return $data;
    }
}
