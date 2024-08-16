<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoleTest extends TestCase
{
    public function testRolesIndexPage()
{

    $response = $this->get(route('roles.index'));

    $response->assertStatus(200);
    $response->assertViewHas('roles');
    $response->assertViewHas('cats');
}


public function testListRoles()
{

    $response = $this->get('/roles');
    $response->assertStatus(200);

}
public function testViewRoleEditPage()
{

    $response = $this->get(route('roles.edit', 1));

    $response->assertStatus(200);

}
    public function test_roles_edit_form()
    {
        $response = $this->get('/roles/1/edit');
        $response->assertStatus(200);

    }

    public function it_displays_add_permissions_form()
    {
        $response = $this->get('/roles/1/give-permission');
        $response->assertStatus(200);
    }
    // public function testDestroyRoleSuccessfully()
    // {

    //     $this->assertDatabaseHas('roles', [
    //         'id' => 11
    //     ]);
    //     $response = $this->get(route('roles.destroy', 11));

    // }
}
