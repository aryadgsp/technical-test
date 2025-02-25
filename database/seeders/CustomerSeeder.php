<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'cust_name' => 'PT Sukses Makmur',
                'cust_code' => 'SUMKA',
                'cust_address' => 'Jalan Anggrek Nomor 1',
                'city_id' => 1,
                'city_name' => 'JAKARTA',
            ],
            [
                'cust_name' => 'PT Berkah Selalu',
                'cust_code' => 'BERKS',
                'cust_address' => 'Jalan Mawar Nomor 2',
                'city_id' => 1,
                'city_name' => 'JAKARTA',
            ],
            [
                'cust_name' => 'PT Maju Lancar',
                'cust_code' => 'MAJUL',
                'cust_address' => 'Jalan Bahagia Nomor 3',
                'city_id' => 2,
                'city_name' => 'BOGOR',
            ],
            [
                'cust_name' => 'PT Sinar Cemerlang',
                'cust_code' => 'SINAC',
                'cust_address' => 'Jalan Kamboja Nomor 3',
                'city_id' => 3,
                'city_name' => 'BANDUNG',
            ],
            [
                'cust_name' => 'PT Berjaya Terang',
                'cust_code' => 'BERJY',
                'cust_address' => 'Jalan Kenanga Nomor 20',
                'city_id' => 4,
                'city_name' => 'SURABAYA',
            ],
            [
                'cust_name' => 'PT Mandiri Abadi',
                'cust_code' => 'MANDA',
                'cust_address' => 'Jalan Kenanga Nomor 10',
                'city_id' => 4,
                'city_name' => 'SURABAYA',
            ],
            [
                'cust_name' => 'PT Lintas Nusantara',
                'cust_code' => 'LINTN',
                'cust_address' => 'Jalan Salak Nomor 5',
                'city_id' => 5,
                'city_name' => 'SEMARANG',
            ],
        ]);
    }
}
