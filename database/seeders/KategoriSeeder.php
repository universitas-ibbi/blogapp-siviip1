<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "nama" => "tips"
            ],
            [
                "nama" => "daily"
            ],
            [
                "nama" => "news"
            ]
        ];
        \App\Models\Kategori::insert($data);
    }
}
