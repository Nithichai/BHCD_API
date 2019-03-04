<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

/*-----------------------------------*/
/* Please check data before test !!! */
/*-----------------------------------*/

class APITest extends TestCase
{   
    // Create

    public function createNewUserInfo()
    {
        $response = $this->json('POST', '/user-info/new', [
            "data" => [
                'id' => 'id002',
                'firstname' => 'first002',
                'lastname' => 'last002',
                'phone' => '+861231234',
                'email' => 'email2@email.com',
                'career' => 'Teacher',
                'birthday' => '1999-09-09'
            ]
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'User information create completed',
                'data' => [
                    'id' => 'id002',
                    'firstname' => 'first002',
                    'lastname' => 'last002',
                    'phone' => '+861231234',
                    'email' => 'email2@email.com',
                    'career' => 'Teacher',
                    'birthday' => '1999-09-09'
                ]
            ]);
    }
    
    
    public function notCreateNewUserInfo()
    {
        $response = $this->json('POST', '/user-info/new', [
            "data" => [
                'xxx' => 'id002',
                'firstname' => 'first002',
                'yyy' => 'last002',
                'phone' => '+861231234',
                'zzz' => 'email2@email.com',
                'career' => 'Teacher',
                'ggez' => '1999-09-09'
            ]
        ]);
        $response
            ->assertStatus(400)
            ->assertJson([
                'message' => 'User information create not completed',
            ]);
    }


    public function createNewUserLine()
    {
        $response = $this->json('POST', '/user-line/new', [
            'id' => "AhxRIsxTnVkpRWPogzyEuKMR0JvOYSXYZ", 
            'esp' => "abcXpcwto9pk"
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'User Line create completed',
                'data' => [
                    'id' => "AhxRIsxTnVkpRWPogzyEuKMR0JvOYSXYZ", 
                    'esp' => "abcXpcwto9pk"
                ]
            ]);
    }


    public function notCreateNewUserLine()
    {
        $response = $this->json('POST', '/user-line/new', ['failed' => 'failed']);
        $response
            ->assertStatus(400)
            ->assertJson([
                'message' => 'User Line create not completed'
            ]);
    }
    
    
    public function createNewDevice() {
        $response = $this->json('POST', '/device/new', [
            'data' => [
                'espname' => 'xxxxxxxxx', 
                'deviceid' => 'xxxxxxxxx'
            ]
        ]);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Device create completed',
                'data' => [
                    'espname' => 'xxxxxxxxx', 
                    'deviceid' => 'xxxxxxxxx'
                ]
            ]);
    }

    
    public function notCreateNewDevice() {
        $response = $this->json('POST', '/device/new', ['failed' => 'failed']);
        $response
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Device create not completed'
            ]);
    }


    public function createDeviceInfoOnlyID() {
        $response = $this->json('POST', '/device-info/new/only-id', ['deviceid' => '123456789']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Device infomation create completed',
                'data' => [
                    'device_id' => '123456789'
                ]
            ]);
    }


    public function notCreateDeviceInfoOnlyID() {
        $response = $this->json('POST', '/device-info/new/only-id', ['failed' => 'failed']);
        $response
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Device infomation not create completed'
            ]);
    }

    // Read

    
    public function foundUserInfoByID()
    {
        $response = $this->json('POST', '/user-info/check/id', ['id' => "gJba2SmyQzY6G2puBkJ923USperdLjato"]);
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Found user infomation',
                'data' => [
                    'user_no' => '9',
                    'id' => "gJba2SmyQzY6G2puBkJ923USperdLjato",
                    'firstname' => "Thelma",
                    'lastname' => "Crist",
                    'phone' => "+7254117297100",
                    'email' => "willms.ashtyn@yahoo.com",
                    'career' => "Medical Technician",
                    'birthday' => "1974-10-05"
                ]
            ]);
    }

    
    public function notFoundUserInfoByID()
    {
        $response = $this->json('POST', '/user-info/check/id', ['id' => 'ggez']);
        $response
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Not found user infomation'
            ]);
    }

    public function errFoundUserInfoByID()
    {
        $response = $this->json('POST', '/user-info/check/id', ['err' => 'err']);
        $response
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Not found user infomation'
            ]);
    }

    
    public function foundUserLineByESP() {
        $response = $this->json('POST', '/user-line/check/esp', ['esp' => "OkDfFLRLMfSr"]);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found user line',
            'data' => [
                'id' => "6wS42A3WdCZnEONCcy92VpXK5H7RNHTNB",
                'esp' => "OkDfFLRLMfSr"
            ]
        ]);
    }


    public function notFoundUserLineByESP() {
        $response = $this->json('POST', '/user-line/check/esp', ['esp' => '']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found user line'
        ]);
    }
    

    public function errFoundUserLineByESP() {
        $response = $this->json('POST', '/user-line/check/esp', ['failed' => 'failed']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found user line'
        ]);
    }

    
    public function foundUserLineByIDESP() {
        $response = $this->json('POST', '/user-line/check/id-esp', ['id' => "6wS42A3WdCZnEONCcy92VpXK5H7RNHTNB", 'esp' => "OkDfFLRLMfSr"]);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found user line',
            'data' => [
                'id' => "6wS42A3WdCZnEONCcy92VpXK5H7RNHTNB",
                'esp' => "OkDfFLRLMfSr"
            ]
        ]);
    }

    
    public function notFoundUserLineByIDESP() {
        $response = $this->json('POST', '/user-line/check/id-esp', ['id' => 'failed', 'esp' => 'failed']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found user line'
        ]);
    }

    
    public function errFoundUserLineByIDESP() {
        $response = $this->json('POST', '/user-line/check/id-esp', ['failed' => 'failed']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found user line'
        ]);
    }

    
    public function foundDeviceESPName() {
        $response = $this->json('POST', '/device/check/espname', ['espname' => 'jB3hTJzFd6Mm']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found device',
            'data' => [
                'espname' => 'jB3hTJzFd6Mm',
                'deviceid' => 'jB3hTJzFd6Mm'
            ]
        ]);
    }

    
    public function notFoundDeviceESPName() {
        $response = $this->json('POST', '/device/check/espname', ['espname' => 'ABC']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found device'
        ]);
    }

    
    public function errFoundDeviceESPName() {
        $response = $this->json('POST', '/device/check/espname', ['failed' => 'failed']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found device'
        ]);
    }
    

    
    public function foundDeviceDeviceID() {
        $response = $this->json('POST', '/device/check/deviceid', ['deviceid' => "jB3hTJzFd6Mm"]);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found device',
            'data' => [
                'espname' => 'jB3hTJzFd6Mm',
                'deviceid' => 'jB3hTJzFd6Mm'
            ]
        ]);
    }

    
    public function notFoundDeviceDeviceID() {
        $response = $this->json('POST', '/device/check/deviceid', ['deviceid' => 'XYZ']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found device'
        ]);
    }

    
    public function errFoundDeviceID() {
        $response = $this->json('POST', '/device/check/deviceid', ['failed' => 'failed']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found device'
        ]);
    }

    // Update



    public function completeUpdateDeviceESPName() {
        $response = $this->json('POST', '/device/update', ['espname' => "TQcHhzDlo7ee", 'password' => 'GGEZ']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Device update complete'
        ]);
    }


    public function notCompleteUpdateESPName() {
        $response = $this->json('POST', '/device/update', ['espname' => '']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Device update not complete'
        ]);
    }

    // Delete

    
    public function completeUserLogout() {
        $this->json('POST', '/user-line/new', [
            'id' => "AhxRIsxTnVkpRWPogzyEuKMR0JvOYSXYZ", 
            'esp' => "abcXpcwto9pk"
        ]);
        $response = $this->json('POST', '/logout', ['id' => "AhxRIsxTnVkpRWPogzyEuKMR0JvOYSXYZ", 'esp' => "abcXpcwto9pk"]);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Logout completed'
        ]);
    }

    
    public function notCompleteUserLogout() {
        $response = $this->json('POST', '/logout', ['id' => "xxx", 'esp' => "uyyy"]);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Logout not completed'
        ]);
    }


    public function errCompleteUserLogout() {
        $response = $this->json('POST', '/logout', ['failed' => 'zzz']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Logout not completed'
        ]);
    }
}
