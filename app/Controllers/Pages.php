<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
    {
        // $faker = \Faker\Factory::create('ja_JP');
        // dd($faker->name);
        $data = [
            'title' => 'Home | Akasuna CI4',
            'array' => ['Sawamura Daichi', 'Kuroo Tetsuro', 'Bokuto Kotaro']
        ];
        return view('pages/home', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Me | Akasuna CI4'
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Me | Akasuna CI4',
            'alamat' =>
            [
                [
                    'tipe' => 'rumah',
                    'alamat' => 'Yokohama Apartment Building C',
                    'kota' => 'Yokohama'
                ],
                [
                    'tipe' => 'kantor',
                    'alamat' => 'Tokyo Comercial Tower',
                    'kota' => 'Tokyo'
                ]
            ]
        ];
        return view('pages/contact', $data);
    }


    //--------------------------------------------------------------------

}
