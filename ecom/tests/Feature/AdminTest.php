<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
class AdminTest extends TestCase
{
    public function testAdminLoginPage()
{
    $response = $this->get(route('admin.login'));
    $response->assertStatus(200);
    $response->assertSee('Login'); // Modify with actual expected content
}
public function testAdminRegisterPage()
{
    $response = $this->get(route('admin.register'));
    $response->assertStatus(200);
    $response->assertSee('Register'); // Modify with actual expected content
}

public function testAdminDashboardAccess()
{
    $response = $this->get(route('admin.index'));
    $response->assertStatus(200);

}



}
