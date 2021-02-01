<?php

use Illuminate\Database\Seeder;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->insert([
            ['name' => 'ADMIN'],
            ['name' => 'REVENDEDORA'],
        ]);

        DB::table('us')->insert(
            ['content' => 'teste']
        );

        DB::table('phones')->insert(
            ['phone' => '5585994253764']
        );
    }
}
