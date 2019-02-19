<?php

use Illuminate\Database\Seeder;

class DeviceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            factory(App\Device::class)->create([
                'espname' => App\UserLine::find($i)->esp,
                'deviceid' => App\UserLine::find($i)->esp,
            ]);
        }
    }
}
