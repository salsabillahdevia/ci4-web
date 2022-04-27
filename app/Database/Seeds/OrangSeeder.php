<?php
// ini buat insert data di tabel cara run nya buka terminal terus ketik php spark db:seed OrangSeeder

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

class OrangSeeder extends \CodeIgniter\Database\Seeder
{
    public function run()
    {
        // // nanti datanya generate dari library faker. ketik composer require fzaninotto/faker di console
        // $data = [
        //     [
        //         'nama' => 'Lan Wang Ji',
        //         'alamat' => 'Gusu Lan',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Wei Wu Xian',
        //         'alamat' => 'Yi Ling',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        //     [
        //         'nama' => 'Jiang Wan Yin',
        //         'alamat' => 'Yun Meng Jiang',
        //         'created_at' => Time::now(),
        //         'updated_at' => Time::now()
        //     ],
        // ];

        // pake lib faker
        $faker = \Faker\Factory::create('id_ID');
        for ($i = 0; $i < 200; $i++) {
            $data = [
                'nama' => $faker->name,
                'alamat' => $faker->address,
                'created_at' => Time::createFromTimestamp($faker->unixTime()),
                'updated_at' => Time::createFromTimestamp($faker->unixTime())
            ];
            $this->db->table('orang')->insert($data);
        }


        // pake simple query
        // $this->db->query(
        //     "INSERT INTO orang (nama,alamat,created_at,updated_at) VALUES(:nama:,:alamat:,:created_at:,:updated_at:)",
        //     $data
        // );

        // pake query builder. kalo insert doang cuma bisa nambahin 1 data. kalo mau nambahin lebih dari 1 data pake insertBatch
        // $this->db->table('orang')->insertBatch($data);
    }
}
