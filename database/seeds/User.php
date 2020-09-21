<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'username' => 'admin',
        	'email' => 'admin@spora.id',
            'id_desa' => '35000',
            'level' => '1',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Pakel',
            'username' => 'pakel',
        	'email' => 'admin@pakel.id',
            'id_desa' => '35001',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Pucung Lor',
            'username' => 'pucunglor',
        	'email' => 'admin@pucunglor.id',
            'id_desa' => '35002',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Srikaton',
            'username' => 'srikaton',
        	'email' => 'admin@srikaton.id',
            'id_desa' => '35003',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Padangan',
            'username' => 'padangan',
        	'email' => 'admin@padangan.id',
            'id_desa' => '35004',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Pinggirsari',
            'username' => 'pinggirsari',
        	'email' => 'admin@pinggirsari.id',
            'id_desa' => '35005',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Bendosari',
            'username' => 'bendosari',
        	'email' => 'admin@bendosari.id',
            'id_desa' => '35006',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Ngantru',
            'username' => 'ngantru',
        	'email' => 'admin@ngantru.id',
            'id_desa' => '35007',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Pulerejo',
            'username' => 'pulerejo',
        	'email' => 'admin@pulerejo.id',
            'id_desa' => '35008',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Pojok',
            'username' => 'pojok',
        	'email' => 'admin@pojok.id',
            'id_desa' => '35009',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Kepuhrejo',
            'username' => 'kepuhrejo',
        	'email' => 'admin@kepuhrejo.id',
            'id_desa' => '35010',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Mojoagung',
            'username' => 'mojoagung',
        	'email' => 'admin@mojoagung.id',
            'id_desa' => '35011',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Batokan',
            'username' => 'batokan',
        	'email' => 'admin@batokan.id',
            'id_desa' => '35012',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('users')->insert([
            'name' => 'Banjarsari',
            'username' => 'banjarsari',
        	'email' => 'admin@banjarsari.id',
            'id_desa' => '35013',
            'level' => '2',
        	'password'  => bcrypt('admin'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
