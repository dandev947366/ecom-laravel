<?php

namespace Tests\Feature;
use App\Models\Category;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Spatie\Permission\PermissionRegistrar;
class PermissionTest extends TestCase
{
    protected function setUp(): void
    {
        // first include all the normal setUp operations
        parent::setUp();

        // now de-register all the roles and permissions by clearing the permission cache
        $this->app->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
    }


    public function test_permission_can_be_created()
{
    // Create a user or use a default one
    $user = User::factory()->create();

    // Simulate form data
    $formData = [
        'name' => 'Test Permission',
    ];

    // Act as the user if needed
    $response = $this->actingAs($user)->post('/permissions', $formData);

    // Assert that the permission was created in the database
    $this->assertDatabaseHas('permissions', [
        'name' => 'Test Permission',
    ]);

    // Assert redirection or response status if necessary
    $response->assertStatus(302); // Check for redirection
    $response->assertRedirect('/permissions'); // Check redirection URL
}

    public function testPermissionsIndexPage()
{

    $response = $this->get(route('permissions.index'));

    $response->assertStatus(200);
    $response->assertViewHas('permissions');
    $response->assertViewHas('cats');
}
public function testListPermissions()
{

    $response = $this->get('/permissions');
    $response->assertStatus(200);

}
public function testViewPermissionEditPage()
{

    $response = $this->get(route('permissions.edit', 2));

    $response->assertStatus(200);

}

public function test_edit_displays_edit_form()
    {
        $response = $this->get('/permissions/2/edit');
        $response->assertStatus(200);
    }


// public function testDestroyPermissionSuccessfully()
//     {

//         $this->assertDatabaseHas('permissions', [
//             'id' => 1
//         ]);
//         $response = $this->get(route('permissions.destroy', 1));

//     }
}
