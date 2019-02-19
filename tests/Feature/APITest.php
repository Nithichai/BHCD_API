<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class APITest extends TestCase
{   
    // Create

    public function createNewUserID()
    {
        $response = $this->json('POST', '/userid/new', ['id' => '', 'esp' => '']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'User ID create completed',
                'data' => [
                    'id' => '', 
                    'esp' => ''
                ]
            ]);
    }

    public function notCreateNewUserID()
    {
        $response = $this->json('POST', '/userid/new', ['failed' => 'failed']);
        $response
            ->assertStatus(400)
            ->assertJson([
                'message' => 'User ID create not completed'
            ]);
    }

    public function createNewDevice() {
        $response = $this->json('POST', '/userid/new', ['id' => 'xxx', 'esp' => '32']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Device create completed',
                'data' => [
                    'id' => '', 
                    'esp' => ''
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
        $response = $this->json('POST', '/device-info/new', ['failed' => 'failed']);
        $response
            ->assertStatus(201)
            ->assertJson([
                'message' => 'Device info create completed',
                'data' => [
                    'device_id' => ''
                ]
            ]);
    }

    public function notCreateDeviceInfoOnlyID() {
        $response = $this->json('POST', '/device-info/new', ['failed' => 'failed']);
        $response
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Device info not create completed'
            ]);
    }

    // Read


    public function foundUserInfo()
    {
        $response = $this->json('POST', '/userid/check', ['id' => '']);
        $response
            ->assertStatus(200)
            ->assertJson([
                'message' => 'Found user infomation',
                'data' => [
                    'user_no' => '',
                    'id' => '',
                    'firstname' => '',
                    'lastname' => '',
                    'phone' => '',
                    'email' => '',
                    'career' => '',
                    'birthday' => ''
                ]
            ]);
    }

    public function notFoundUserInfo()
    {
        $response = $this->json('POST', '/userinfo/check', ['id' => '']);
        $response
            ->assertStatus(404)
            ->assertJson([
                'message' => 'Not found user infomation'
            ]);
    }

    public function errFoundUserInfo()
    {
        $response = $this->json('POST', '/userinfo/check', ['failed' => 'failed']);
        $response
            ->assertStatus(400)
            ->assertJson([
                'message' => 'Error to find user information'
            ]);
    }

    public function foundUserIDByESP() {
        $response = $this->json('POST', '/userid/check/esp', ['esp' => '']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found user id',
            'data' => [
                'user_no' => '',
                'id' => '',
                'esp' => ''
            ]
        ]);
    }

    public function notFoundUserIDByESP() {
        $response = $this->json('POST', '/userid/check/esp', ['esp' => '']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found user id'
        ]);
    }

    public function errFoundUserIDByESP() {
        $response = $this->json('POST', '/userid/check/esp', ['failed' => 'failed']);
        $response
        ->assertStatus(400)
        ->assertJson([
            'message' => 'Error to find user id'
        ]);
    }

    public function foundUserIDByIDESP() {
        $response = $this->json('POST', '/userid/check/id-esp', ['id' => '', 'esp' => '']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found user id',
            'data' => [
                'user_no' => '',
                'id' => '',
                'esp' => ''
            ]
        ]);
    }

    public function notFoundUserIDByIDESP() {
        $response = $this->json('POST', '/userid/check/id-esp', ['id' => '', 'esp' => '']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Not found user id'
        ]);
    }

    public function errFoundUserIDByIDESP() {
        $response = $this->json('POST', '/userid/check/id-esp', ['failed' => 'failed']);
        $response
        ->assertStatus(400)
        ->assertJson([
            'message' => 'Error to find user id'
        ]);
    }

    public function foundDeviceESPName() {
        $response = $this->json('POST', '/device/espname', ['espname' => '']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found device',
            'data' => [
                'espno' => '',
                'espname' => '',
                'password' => '',
                'deviceid' => ''
            ]
        ]);
    }

    public function notFoundDeviceESPName() {
        $response = $this->json('POST', '/device/espname', ['espname' => '']);
        $response
        ->assertStatus(400)
        ->assertJson([
            'message' => 'Not found device'
        ]);
    }

    public function errFoundDeviceESPName() {
        $response = $this->json('POST', '/device/espname', ['failed' => 'failed']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Error to find device'
        ]);
    }
    
    public function foundDeviceID() {
        $response = $this->json('POST', '/device/id', ['deviceid' => '']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Found device',
            'data' => [
                'espno' => '',
                'espname' => '',
                'password' => '',
                'deviceid' => ''
            ]
        ]);
    }

    public function notFoundDeviceID() {
        $response = $this->json('POST', '/device/id', ['deviceid' => '']);
        $response
        ->assertStatus(400)
        ->assertJson([
            'message' => 'Not found device'
        ]);
    }

    public function errFoundDeviceID() {
        $response = $this->json('POST', '/device/id', ['failed' => 'failed']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Error to find device'
        ]);
    }

    // Update

    public function completeUpdateESP() {
        $response = $this->json('POST', '/device/update', ['espname' => '']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Complete update device',
            'data' => [
                'espno' => '',
                'espname' => '',
                'password' => '',
                'deviceid' => ''
            ]
        ]);
    }

    public function notCompleteUpdateESP() {
        $response = $this->json('POST', '/device/update', ['espname' => '']);
        $response
        ->assertStatus(400)
        ->assertJson([
            'message' => 'Not complete update device'
        ]);
    }

    // Delete


    public function completeUserLogout() {
        $this->json('POST', '/logout', ['id' => '', 'esp' => '']);
        $response = $this->json('POST', '/userid/check/id-esp', ['id' => '', 'esp' => '']);
        $response
        ->assertStatus(200)
        ->assertJson([
            'message' => 'Logout completed'
        ]);
    }

    public function notCompleteUserLogout() {
        $this->json('POST', '/logout', ['id' => '', 'esp' => '']);
        $response = $this->json('POST', '/userid/check/id-esp', ['id' => '', 'esp' => '']);
        $response
        ->assertStatus(404)
        ->assertJson([
            'message' => 'Logout not completed'
        ]);
    }

    public function errCompleteUserLogout() {
        $response = $this->json('POST', '/logout', ['failed' => '']);
        $response
        ->assertStatus(400)
        ->assertJson([
            'message' => 'Logout error'
        ]);
    }
}
