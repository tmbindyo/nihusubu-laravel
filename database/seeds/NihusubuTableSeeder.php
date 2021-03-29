<?php

use Illuminate\Database\Seeder;

class FiscalYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        DB::table('nihusubus')->insert([

            'id' => '4be20a9a-aee3-414c-b8ba-dcacf859cc9c',
            'name' => 'Nihusubu',
            'kra_pin_number' => 'Nihusubu',
            'email' => 'info@nihusubu.com',
            'phone_number' => '254708085128',
            'website' => 'www.nihusubu.com',

            'town' => 'Nairobi',
            'po_box' => 'Nairobi',
            'postal_code' => '00100',
            'address_line_1' => 'General Accident House, 2nd Floor',
            'street' => 'Ralph Bunche Rd',

            'instagram' => 'http://instagram.com/nihusubu',
            'facebook' => 'http://facebook.com/nihusubu',
            'twitter' => 'http://twitter.com/nihusubu',

            'currency_id' => '0839e6c9-20b3-4442-b3b6-5137a4d309ec',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'logo_id' => '4be20a9a-aee3-414c-b8ba-dcacf859cc9c',
            'user_id' => 1,
            'created_at' => now()
        ]);



        DB::table('uploads')->insert([

            'id' => '4be20a9a-aee3-414c-b8ba-dcacf859cc9c',
            'name' => 'logo_transparent.png',
            'extension' => 'png',
            'size' => '33',
            'file_type' => 'png',
            'file' => '/logo_transparent.png',
            'original' => '/logo_transparent.png',

            'upload_type_id' => 'D2583EA1-B175-482E-89CF-AA8D4AE73391',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);


        // agent tiers
        DB::table('tiers')->insert([
            'id' => 'F38959BC-D6A8-4DD9-9EE2-68D63296E5DE',
            'name' => '1',
            'amount' => '0.15',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);

        DB::table('tiers')->insert([
            'id' => '8BCCEAE0-4952-4118-BABF-10C809C4F110',
            'name' => '2',
            'amount' => '0.10',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);

        DB::table('tiers')->insert([
            'id' => '54A5E1AA-C51F-4D5E-993E-0711B63FA03C',
            'name' => '3',
            'amount' => '0.05',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);

        DB::table('tiers')->insert([
            'id' => '85342A2B-9366-4DD4-A0FA-B3C70253D6C2',
            'name' => '4',
            'amount' => '0.025',
            'status_id' => 'c670f7a2-b6d1-4669-8ab5-9c764a1e403e',
            'user_id' => 1,
            'created_at' => now()
        ]);

    }
}
