<?php

namespace Tests\Feature\Frontend;

use App\Events\Auth\UserLoggedIn;
use App\Models\User;
use Event;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;

/**
 * Class LoginTest.
 */
class LoginTest extends TestCase
{
    /** @test */
    public function the_login_route_exists()
    {
        $this->get('/login')->assertStatus(200);
    }

    /** @test */
    public function login_requires_validation()
    {
        $response = $this->post('/login');

        $response->assertSessionHasErrors(['email', 'password']);
    }

    /** @test */
//    public function a_user_can_login_with_email_and_password()
//    {
//        Event::fake();
//
//        $user = User::factory()->create([
//            'email' => 'developervijay7@example.com',
//            'password' => 'Password@123',
//        ]);
//
//        $this->post('/login', [
//            'email' => 'developervijay7@example.com',
//            'password' => 'Password@123',
//        ])->assertRedirect(route(homeRoute()));
//
//        Event::assertDispatched(function (UserLoggedIn $event) use ($user) {
//            return $event->user->id === $user->id;
//        });
//
//        $this->assertAuthenticatedAs($user);
//    }

    /** @test */
//    public function inactive_users_cant_login()
//    {
//        User::factory()->inactive()->create([
//            'email' => 'developervijay7@example.com',
//            'password' => 'Password@123',
//        ]);
//
//        $response = $this->post('/login', [
//            'email' => 'developervijay7@example.com',
//            'password' => 'Password@123',
//        ]);
//
//        $response->assertSessionHas('flash_error', __('Your account has been deactivated.'));
//        $this->assertFalse($this->isAuthenticated());
//    }

    /** @test */
    public function cant_login_with_invalid_credentials()
    {
        $this->withoutExceptionHandling();
        $this->expectException(ValidationException::class);

        $response = $this->post('/login', [
            'email' => 'not-existend@user.com',
            'password' => '9s8gy8s9diguh4iev',
        ]);

        $response->assertSessionHas('flash_error', __('These credentials do not match our records.'));
        $this->assertFalse($this->isAuthenticated());
    }

    /** @test */
//    public function a_users_ip_and_login_time_is_updated_on_login()
//    {
//        $user = User::factory()->create([
//            'email' => 'developervijay7@example.com',
//            'password' => 'Password@123',
//            'last_login_at' => null,
//            'last_login_ip' => null,
//        ]);
//
//        $this->post('/login', [
//            'email' => 'developervijay7@example.com',
//            'password' => 'Password@123',
//        ]);
//
//        $this->assertDatabaseMissing('users', [
//            'id' => $user->id,
//            'last_login_at' => null,
//            'last_login_ip' => null,
//        ]);
//    }

    /** @test */
    public function a_user_can_log_out()
    {
        $user = User::factory()->create();

        $this->actingAs($user)
            ->post('/logout')
            ->assertRedirect('/');

        $this->assertFalse($this->isAuthenticated());
    }
}
