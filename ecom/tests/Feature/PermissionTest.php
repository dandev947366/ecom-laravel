<?php

namespace Tests\Feature;
use App\Models\Category;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Ensure CSRF middleware is disabled during tests
        $this->withoutMiddleware(\App\Http\Middleware\DisableCsrfProtection::class);
    }

    /** @test */
    public function a_permission_can_be_created()
    {
        // Make a POST request to create a permission
        $response = $this->post('/permissions', [
            'name' => 'Test Permission',
        ]);

        $this->assertDatabaseHas('permissions', [
            'name' => 'Test Permission',
        ]);
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
