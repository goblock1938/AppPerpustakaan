<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_authenticated_user_can_view_profile_and_change_password(): void
    {
        $user = User::factory()->create([
            'name' => 'Petugas Satu',
            'email' => 'petugas@example.com',
            'password' => 'old-password',
        ]);

        $this->actingAs($user)
            ->get(route('profile.show'))
            ->assertOk()
            ->assertSee('Petugas Satu')
            ->assertSee('petugas@example.com')
            ->assertSee('petugas');

        $this->put(route('profile.password.update'), [
            'current_password' => 'wrong-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])->assertSessionHasErrors('current_password');

        $this->put(route('profile.password.update'), [
            'current_password' => 'old-password',
            'password' => 'new-password',
            'password_confirmation' => 'new-password',
        ])->assertRedirect(route('profile.show'))
            ->assertSessionHas('success');

        $this->assertTrue(Hash::check('new-password', $user->fresh()->password));
    }
}
