<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;
use App\Car;
class RouteTest extends TestCase
{

    private function createUser(){
        User::where('email', 'unittest@unittest.com')->delete();
        $user = new User;
        $user->first_name = 'Unit';
        $user->last_name = 'Test';
        $user->email = 'unittest@unittest.com';
        $user->password = bcrypt('kendricktakengo');
        $user->remember_token = str_random(10);
        $user->last_ip = '::1';
        $user->save();
        return $user;
    }

    private function deleteUser($user){
        $user->delete();
    }

    public function testDashboardRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testHomeRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/home');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testCarsRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/cars');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testCarsAddRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/cars/new');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testCarsAddSubmitRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->post('/cars');
        $response->assertStatus(302);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testCarsSingleRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/cars/1');
        $this->assertTrue($response->getStatusCode() == 200 || $response->getStatusCode() == 302);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testOrdersRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/orders');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testMessagesRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/messages');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testNewslettersRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/newsletters');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testUsersRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/users');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testAdminsRoute(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/admins');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testLoginRouteWithAuth(){
        $user = $this->createUser();
        $this->actingAs($user);
        $response = $this->get('/login');
        $response->assertStatus(302);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
        $this->deleteUser($user);
    }

    public function testLoginRouteWithoutAuth(){
        $response = $this->get('/login');
        $response->assertStatus(200);
        $this->assertTrue($response->getStatusCode() != 404);
        $this->assertTrue($response->getStatusCode() != 500);
    }

    public function testShouldNoRegisterRoute(){
        $response = $this->get('/register');
        $response->assertStatus(404);
    }
    
    public function testShouldNoRegisterSubmitRoute(){
        $response = $this->post('/register');
        $response->assertStatus(404);
    }
}
