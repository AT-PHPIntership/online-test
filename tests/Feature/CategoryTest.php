<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory;

class CategoryTest extends TestCase
{
	use WithoutMiddleware;
	/**
	 * [setUp description]
	 */
	public function setUp()
    {
        parent::setUp();
        $adminUser = factory(\App\Models\AdminUser::class)->create();
        return $this->be($adminUser);
    }
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->call('GET', route('admin.categories.create'));
        $response->assertStatus(200);
    }
}
