<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use App\Models\Address;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_be_created()
    {
        $user = factory(User::class)->create();

        $this->assertInstanceOf(User::class, $user);
        $this->assertDatabaseHas('users', ['email' => $user->email]);
    }

    public function test_user_can_have_multiple_addresses()
    {
        $user = factory(User::class)->create();
        $address1 = factory(Address::class)->create(['user_id' => $user->id]);
        $address2 = factory(Address::class)->create(['user_id' => $user->id]);

        $this->assertCount(2, $user->addresses);
    }
}
