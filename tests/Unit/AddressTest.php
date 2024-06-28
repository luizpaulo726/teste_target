<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Address;

class AddressTest extends TestCase
{
    use RefreshDatabase;

    public function test_address_can_be_created()
    {
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create(['user_id' => $user->id]);

        $this->assertInstanceOf(Address::class, $address);
        $this->assertDatabaseHas('addresses', ['id' => $address->id]);
    }

    public function test_address_belongs_to_user()
    {
        $user = factory(User::class)->create();
        $address = factory(Address::class)->create(['user_id' => $user->id]);

        $this->assertEquals($user->id, $address->user->id);
    }
}

