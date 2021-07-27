<?php

use Illuminate\Database\Seeder;

class TestusersTableSeeder extends Seeder
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
        DB::table('testusers')->insert($param);

        $param = [
            'name' => 'hanako',
            'mail' => 'hanako@t.com',
            'age' => '40'
        ];
        DB::table('testusers')->insert($param);

        $param = [
            'name' => 'sachiko',
            'mail' => 'sachiko@t.com',
            'age' => '40'
        ];
        DB::table('testusers')->insert($param);
    }
}
