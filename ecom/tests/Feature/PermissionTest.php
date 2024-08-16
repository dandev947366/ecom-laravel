<?php

namespace Tests\Feature;
use App\Models\Category;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PermissionTest extends TestCase
{


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
