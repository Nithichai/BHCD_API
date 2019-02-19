<?php

use Illuminate\Database\Seeder;

class DeviceInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            factory(App\DeviceInfomation::class)->create([
                'device_id' => App\UserLine::find($i)->esp
            ]);
        }
    }
}
