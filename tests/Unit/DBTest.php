<?php

namespace Tests\Unit;

use App\UserInfo;
use App\UserLine;
use App\Device;
use App\DeviceInfo;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

/*-----------------------------------*/
/* Please check data before test !!! */
/*-----------------------------------*/

class DBTest extends TestCase
{

    public function checkUserInfo() {
        $this->assertDatabaseHas('user_info', [
            'id' => "ipK7q5kZiLp8ULRkZyBrOodDuu7lXYT98",
            'firstname' => "Icie",
            'lastname' => "Bradtke",
            'phone' => "+6181558251938",
            'email' => "ethel.gibson@hotmail.com",
            'career' => "Auditor",
            'birthday' => "1973-06-05"
        ]);
    }


    public function checkUserInfoByWhere() {
        $userInfoObj = new UserInfo;
        $userInfo = $userInfoObj->where('id', "gJba2SmyQzY6G2puBkJ923USperdLjato")->first();
        $this->assertDatabaseHas('user_info', $userInfo->toArray());
    }

    
    public function checkUserLine() {
        $this->assertDatabaseHas('userline', [
            'id' => "ipK7q5kZiLp8ULRkZyBrOodDuu7lXYT98",
            'esp' => "TQcHhzDlo7ee"
        ]);
    }

    
    public function checkUserLineByAndWhere() {
        $userLineObj = new UserLine;
        $userLine = $userLineObj
            ->where('id', "6wS42A3WdCZnEONCcy92VpXK5H7RNHTNB")
            ->where('esp', "OkDfFLRLMfSr")
            ->first();
        $this->assertDatabaseHas('userline', $userLine->toArray());
    }

    
    public function checkDevice() {
        $this->assertDatabaseHas('device', [
            'espname' => "TQcHhzDlo7ee",
            'deviceid' => "TQcHhzDlo7ee"
        ]);
    }

    
    public function checkDeviceByWhereESPName() {
        $deviceObj = new Device;
        $device = $deviceObj
            ->where('espname', "jB3hTJzFd6Mm")
            ->first();
        $this->assertDatabaseHas('device', $device->toArray());
    }


    public function checkDeviceByWhereDeviceID() {
        $deviceObj = new Device;
        $device = $deviceObj
            ->where('deviceid', "jB3hTJzFd6Mm")
            ->first();
        $this->assertDatabaseHas('device', $device->toArray());
    }

    /** @test */
    public function checkDeviceHashPassword() {
        // $deviceObj = new Device;
        // $device = $deviceObj->where('espname', 'esp001')->first();
        $this->assertTrue(Hash::check('lnwza007', '$2y$10$i1z0aTGTgePyeHzMKMBkd.JR8X0A0FVDRlm1zDrttG4yuwJomu5LS'));
    }

    
    public function checkDeviceInfo() {
        $this->assertDatabaseHas('device_infomation', [
            'device_id' => "TQcHhzDlo7ee",
            'name' => "Osvaldo",
            'sex' => "Keebler",
            'height' => 158,
            'weight' => 133,
            'disease' => '',
            'phone' => "+4924188606014",
            'birthday' => "1997-12-22"
        ]);
    }
}
