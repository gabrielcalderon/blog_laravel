<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use App\{User, Role};

class UserModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    public function it_index_admin_users_in_index()
    {
        $this->withoutExceptionHandling();
        Role::generate_roles();

        $user = factory(User::class)->create([
            'role_id' => 2,
        ]);
        $this->actingAs($user);

        // $admin = new AdminMiddleware();

        // $request = Request::create(route('admin.users.index'),'GET');

        factory(User::class)->create([
            'name' => 'jose2',
            'role_id' => 1,
        ]);

        // $admin->handle($request, function(){});
        $this->get(route('admin.users.index'))
            ->assertStatus(200)
            ->assertSee('jose2')
            ->assertSee('User');

    }
}
