<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Item;

class ItemTest extends TestCase
{
    // Migrate
    // Clean the database
    use RefreshDatabase;

    private $user, $item;

    public function setUp():void
    {
        parent::setUp();

        $this->user = User::factory()->create();
        $this->item = Item::factory()->create();
    }


    public function test_fetch_all_item()
    {
        $response = $this->getJson(route('item.index'))->assertOk()->json();

        $this->assertEquals(1, count($response));
    }

    public function test_fetch_single_item()
    {
        $response = $this->getJson(route('item.show', $this->item))
                    ->assertOk()->json();

        $this->assertEquals($response[0]['name'], $this->item->name);
    }

    public function test_store_new_item()
    {
        $this->actingAs($this->user);

        $this->postJson(route('item.store'), [
            'name'        => 'Item 1',
            'description' => 'This is Item 1.',
            'slug'        => 'item-1'
        ])->assertCreated();
    }

    public function test_update_previous_item()
    {
        $this->actingAs($this->user);

        $this->putJson(route('item.update', $this->item), [
            'name'        => 'iPhone 13 Pro Max',
            'description' => 'This is Apple Smartphone',
            'slug'        => 'iphone-13-pro-max'
        ])->assertSuccessful();
    }

    public function test_destroy_item()
    {
        $this->actingAs($this->user);

        $this->deleteJson(route('item.destroy', $this->item))
        ->assertSuccessful();
    }

    public function test_search_item()
    {
        $response = $this->getJson(route('item.search', $this->item->name))
                    ->assertOk()->json();

        $this->assertEquals($this->item->name, $response[0]['name']);
    }
}
