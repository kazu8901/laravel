<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $param = [
            'name' => 'taro',
            'mail' => 'taro@t.com',
            'age' => '34'
        ];
        DB::table('user')->insert($param);

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@t.com',
            'age' => '40'
        ];
        DB::table('user')->insert($param);

        $param = [
            'name' => 'sachiko',
            'mail' => 'sachiko@t.com',
            'age' => '40'
        ];
        DB::table('user')->insert($param);
    }
}
