<?php

namespace Tests\Unit;

use App\UserInfo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DBTest extends TestCase
{
    public function checkRandomUserLine()
    {
        $userLine = new UserLine;
        $esp = $userLine->inRandomOrder()->get()->first()->esp;
        $this->assertDatabaseHas('userline', [
            'esp' => $esp
        ]);
    }

    /** @test */
    public function checkIDfromUserInfo() {
        $userinfo = new UserInfo;
        $esp = $userinfo::find(1)->id;
        $this->assertEquals($esp, "hIANZj43nAje13rS0kRLA7r2P29KFot8H");
    }
}
