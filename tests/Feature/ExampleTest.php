<?php

//namespace Tests\Feature;
namespace Tests\Browser;

//use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\DuskTestCase;
use Laravel\Dusk\Chrome;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExampleTest extends DuskTestCase
{
//    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
//        $response = $this->get('/users');
//
//        $response->assertStatus(200);


        $this->browse(function ($browser)  {
            $browser->visit('login')
                ->type('userName', 'tom')
                ->type('userPassword', '123')
                ->press('Enter')
                ->pause(1000)
                ->assertPathIs('/users');
        });


        $this->browse(function ($browser)  {
            $browser->visit('login')
                ->type('userName', 'tom')
                ->type('userPassword', '123')
                ->press('Enter')
                ->pause(1000)
                ->assertPathIs('/users')
                ->assertSee('Liam')
                ->clickLink('Liam')
                ->pause(1000)
                ->assertPathIs("/user-details/2");
        });


    }
}
