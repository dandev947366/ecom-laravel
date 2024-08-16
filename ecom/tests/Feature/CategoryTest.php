<?php

namespace Tests\Feature;
use App\Models\Category;

use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{



    public function test_index_displays_categories()
    {

        $response = $this->get(route('category.index'));
        $response->assertStatus(200);
        $response->assertSee('Test Category'); // Check if category appears in the response
    }
    public function test_create_displays_create_form()
    {
        $response = $this->get(route('category.create'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.category.create');
    }



    public function testListCategories()
{

    $response = $this->get('/admin/category');
    $response->assertStatus(200);

}
public function testViewCategoryEditPage()
{

    $response = $this->get(route('category.edit', 2));

    $response->assertStatus(200);

}
public function test_edit_displays_edit_form()
    {
        $response = $this->get('/admin/category/2/edit');
        $response->assertStatus(200);
    }
public function testViewSingleCategory()
{

    $response = $this->get("/admin/category/2");
    $response->assertStatus(200);

}

// public function testDestroyCategorySuccessfully()
//     {
//         $this->assertDatabaseHas('categories', [
//             'id' => 2
//         ]);
//         $response = $this->get(route('category.destroy', 2));

//     }

}
