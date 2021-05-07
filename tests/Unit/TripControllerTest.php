<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class TripControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function getWelcomeRoute(){
        $response = $this->get("/");
        $response->assertStatus(200);

    }

}
