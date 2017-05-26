<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory;

class CategoryTest extends TestCase
{
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
        $response = $this->call('GET', route('admin.categories.index'));
        $response->assertStatus(302);
    }

    public function testCreate()
    {
    	$dataCategory = [
    		'name' => 'Name',
    	];
        $this->call('POST', route('admin.categories.store'), $dataCategory);
        // $this->assertDatabaseHas('categories',[
        // 	'name'=>$dataCategory['name'],
        // 	]);
    	// $this->call('GET',route('admin.categories.index'));

    }
}