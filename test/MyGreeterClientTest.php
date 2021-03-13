<?php

use MyGreeter\Client;

class MyGreeterClientTest extends PHPUnit\Framework\TestCase
{

    public $greeter;

    public function setUp(): void
    {
        parent::setUp();
        $this->greeter = new Client();
    }

    public function test_Instance()
    {
        $this->assertEquals(
            get_class($this->greeter),
            'MyGreeter\Client'
        );
    }

    public function test_getGreeting()
    {
        $this->assertTrue(
            strlen($this->greeter->getGreeting()) > 0
        );
    }

    public function testGoodMorning()
    {
        $array                      = range(0, 11);
        $this->greeter->currentHour = $array[array_rand($array)];
        $msg                        = $this->greeter->getGreeting();
        $this->assertEquals($msg, 'Good morning');
    }

    public function testGoodAfternoon()
    {
        $array                      = range(12, 17);
        $this->greeter->currentHour = $array[array_rand($array)];
        $msg                        = $this->greeter->getGreeting();
        $this->assertEquals($msg, 'Good afternoon');
    }

    public function testGoodEvening()
    {
        $array                      = range(18, 23);
        $this->greeter->currentHour = $array[array_rand($array)];
        $msg                        = $this->greeter->getGreeting();
        $this->assertEquals($msg, 'Good evening');
    }

    public function testInvalidHour()
    {
        $this->greeter->currentHour = 25;
        $msg                        = $this->greeter->getGreeting();
        $this->assertEquals($msg, 'Invalid Hour');
    }

    public function testCurrentHourMsg()
    {
        $hour = date('H');
        $msg  = $this->greeter->getGreeting();
        switch ($hour >= 0) {
            case $hour < 12:
                $greeterMsg = 'Good morning';
                break;
            case $hour < 18:
                $greeterMsg = 'Good afternoon';
                break;
            case $hour < 24:
                $greeterMsg = 'Good evening';
                break;
            default:
                $greeterMsg = 'Invalid Hour';
        }
        $this->assertEquals($msg, $greeterMsg);
    }
}