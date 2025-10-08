<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => '1', 'name' => 'Admim', 'name_b' => null, 'email' => 'dev.admin@shafi95.com', 'permission' => '1', 'phone' => null, 'd_o_b' => '2019-06-01', 'profession_id' => null, 'address' => 'Dhaka', 'email_verified_at' => null, 'password' => '$2y$10$PueMSdrqB726KXjrDQE45e1IDNHzc7LGrnWb9Jmhb0r0EzldzxLdO', 'remember_token' => null, 'image' => null, 'created_at' => '2021-08-06 21:47:36', 'updated_at' => '2024-10-22 21:15:04', 'school' => null, 'district' => null, 'pre_address' => null, 'blood' => null, 'fb' => null],
            ['id' => '2', 'name' => 'Md. Lutful Haque', 'name_b' => null, 'email' => 'lutful70@yahoo.com', 'permission' => '1', 'phone' => '01711446246', 'd_o_b' => null, 'profession_id' => null, 'address' => 'Flat # 703, Building # 11, Japan Garden City, Mohammadpur', 'email_verified_at' => null, 'password' => '$2y$10$74aXyb/aurQRaaY.eJdIhuZxCXb1EVLS15stq8RSGOiBrHuv5HZja', 'remember_token' => null, 'image' => 'user-f62c4e6edb.webp', 'created_at' => '2022-03-05 15:33:31', 'updated_at' => '2025-10-06 10:19:03', 'school' => null, 'district' => null, 'pre_address' => null, 'blood' => null, 'fb' => null],
            ['id' => '3', 'name' => 'Md. Lutful Haque', 'name_b' => 'মোহাম্মদ লুৎফুল হক', 'email' => 'lutful70@gmail.com', 'permission' => '2', 'phone' => '01711446246', 'd_o_b' => null, 'profession_id' => '1', 'address' => 'Gopalpur, Tangail', 'email_verified_at' => null, 'password' => '$2y$10$rehuM3IccoWm.Z.DLZm12OgnANZWlqxFHz9A7fOlgoeRoBj1gYluW', 'remember_token' => null, 'image' => 'user9953.jpg', 'created_at' => '2022-05-12 14:55:00', 'updated_at' => '2024-11-06 18:55:59', 'school' => 'Suti v. m high school', 'district' => null, 'pre_address' => 'Tangail', 'blood' => '0+ve', 'fb' => null],
            ['id' => '4', 'name' => 'Md. Lutful Haque', 'name_b' => null, 'email' => 'shoebtangail@gmail.com', 'permission' => '0', 'phone' => '01711446246', 'd_o_b' => null, 'profession_id' => null, 'address' => 'Flat-703, Building-11', 'email_verified_at' => null, 'password' => 'Parol#@1', 'remember_token' => null, 'image' => 'user3617.jpeg', 'created_at' => '2022-07-04 14:04:31', 'updated_at' => '2025-10-08 10:07:24', 'school' => null, 'district' => null, 'pre_address' => null, 'blood' => null, 'fb' => null],
            ['id' => '5', 'name' => 'Rabiuzzaman Niloy', 'name_b' => null, 'email' => 'rzniloy@gmail.com', 'permission' => '0', 'phone' => '+8801986250485', 'd_o_b' => null, 'profession_id' => '1', 'address' => '60/C, P.T.I Road', 'email_verified_at' => null, 'password' => '12345678', 'remember_token' => null, 'image' => null, 'created_at' => '2022-11-02 13:41:37', 'updated_at' => '2022-11-02 13:41:37', 'school' => null, 'district' => null, 'pre_address' => null, 'blood' => null, 'fb' => null],
            ['id' => '6', 'name' => 'Mohammad Lutful Haque', 'name_b' => null, 'email' => 'sa@blri.gov.bd', 'permission' => '1', 'phone' => '01711446246', 'd_o_b' => null, 'profession_id' => '1', 'address' => 'SUTI  HIZULIPARA, GOPALPUR, TANGAIL - 1990', 'email_verified_at' => null, 'password' => 'Admin!23', 'remember_token' => null, 'image' => 'user2235.jpg', 'created_at' => '2025-08-28 14:25:27', 'updated_at' => '2025-10-08 10:07:50', 'school' => null, 'district' => null, 'pre_address' => null, 'blood' => null, 'fb' => null],
            ['id' => '7', 'name' => 'মোঃ লুৎফুল হক সোয়েব', 'name_b' => null, 'email' => 'sutihizulipara@gmail.com', 'permission' => '1', 'phone' => '01711446246', 'd_o_b' => null, 'profession_id' => null, 'address' => 'Flat-703, Building-11', 'email_verified_at' => null, 'password' => '123456', 'remember_token' => null, 'image' => 'user2873.png', 'created_at' => '2025-10-06 23:11:32', 'updated_at' => '2025-10-06 23:11:32', 'school' => null, 'district' => null, 'pre_address' => null, 'blood' => null, 'fb' => null],
        ];
        DB::table('users')->insert($users);
    }
}
