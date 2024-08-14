<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use App\Models\Category;
use Spatie\Permission\Models\Role;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testHomePage()
{
    $response = $this->get(route('index'));
    $response->assertStatus(200);
}

public function testAdminLoginPage()
{
    $response = $this->get(route('admin.login'));
    $response->assertStatus(200);
    $response->assertSee('Login'); // Modify with actual expected content
}
public function testListCategories()
{

    $response = $this->get('/admin/category');
    $response->assertStatus(200);

}
public function testViewSingleCategory()
{

    $response = $this->get("/admin/category/1");
    $response->assertStatus(200);

}
public function testDestroyCategorySuccessfully()
    {

        $this->assertDatabaseHas('categories', [
            'id' => 2
        ]);
        $response = $this->get(route('category.destroy', 2));

    }
public function testPermissionsIndexPageIsAccessible()
{

    $response = $this->get(route('permissions.index'));

    $response->assertStatus(200);
}

public function testPermissionsIndexPage()
{

    $response = $this->get(route('permissions.index'));

    $response->assertStatus(200);
    $response->assertViewHas('permissions');
    $response->assertViewHas('cats');
}
public function testRolesIndexPage()
{

    $response = $this->get(route('roles.index'));

    $response->assertStatus(200);
    $response->assertViewHas('roles');
    $response->assertViewHas('cats');
}
public function testShowEditRoleForm()
    {
        $response = $this->get(route('roles.edit', 11));

        $response->assertStatus(200);
        $response->assertViewHas('role');
        $response->assertViewHas('cats');
    }

    public function testDestroyRoleSuccessfully()
    {

        $this->assertDatabaseHas('roles', [
            'id' => 11
        ]);
        $response = $this->get(route('roles.destroy', 11));

    }

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


public function testShowEditUserForm()
    {
        $response = $this->get(route('users.edit', 1));

        $response->assertStatus(200);
        $response->assertViewHas('user');
        $response->assertViewHas('cats');
    }

    public function testDestroyUserSuccessfully()
    {

        $this->assertDatabaseHas('users', [
            'id' => 1
        ]);
        $response = $this->get(route('users.destroy', 1));

    }




public function testAdminDashboardAccess()
{
    $response = $this->get(route('admin.index'));
    $response->assertStatus(200);

}
public function testListPermissions()
{

    $response = $this->get('/permissions');
    $response->assertStatus(200);

}
public function testDestroyPermissionSuccessfully()
    {

        $this->assertDatabaseHas('permissions', [
            'id' => 17
        ]);
        $response = $this->get(route('permissions.destroy', 17));

    }

}
