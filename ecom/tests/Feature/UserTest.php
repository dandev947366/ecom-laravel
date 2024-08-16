<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    public function testUsersIndexPage()
{

    $response = $this->get(route('users.index'));

    $response->assertStatus(200);
    $response->assertViewHas('users');
    $response->assertViewHas('cats');
}
public function testViewUserEditPage()
{

    $response = $this->get(route('users.edit', 1));

    $response->assertStatus(200);

}
public function testListUsers()
{

    $response = $this->get('/users');
    $response->assertStatus(200);

}


public function testShowEditUserForm()
    {
        $response = $this->get('/users/1/edit');

        $response->assertStatus(200);
        $response->assertViewHas('user');
        $response->assertViewHas('cats');
    }

    // public function testDestroyUserSuccessfully()
    // {

    //     $this->assertDatabaseHas('users', [
    //         'id' => 1
    //     ]);
    //     $response = $this->get(route('users.destroy', 1));

    // }

}
