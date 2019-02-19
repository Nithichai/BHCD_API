<?php

use App\UserLine;
use Illuminate\Database\Seeder;

class UserLineTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            factory(App\UserLine::class)->create([
                'id' => App\UserInfo::find($i)->id
            ]);
        }
    }
}
