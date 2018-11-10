<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\Concerns\InteractsWithDatabase;

use App\User;

class UsersTest extends TestCase
{
    use DatabaseTransactions;
    use InteractsWithDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCanSeeUserPage()
    {
        //Arrange
        $user = factory(User::class)->create();

        //Act
        $response = $this->get('/users/'.$user->username);

        //Assert
        $response->assertSee($user->name);
    }

    public function testCanLogin(){
        //Arange
        $user = factory(User::class)->create();

        //Act
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'secret'
        ]);

        //Assert
        $this->assertAuthenticated();
        $this->assertAuthenticatedAs($user);

    }

    public function testCanFollow(){
        //Arange
        $user = factory(User::class)->create();
        $other = factory(User::class)->create();

        //Act
        $response = $this->actingAs($user)->post('/users/'.$other->username.'/follow');

        //Assert
        $this->assertDatabaseHas('followers', [
        'user_id' => $user->id,
        'follower_id'=> $other->id,
        ]);
    }
}
