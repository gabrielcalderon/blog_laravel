<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;
use App\{User, Role, Image, Profile};
use Illuminate\Support\Facades\Auth;

class UserModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
    *@test
    */
    function it_index_admin_users_in_index()
    {
        $this->withoutExceptionHandling();
        Role::generate_roles();

        $user = factory(User::class)->create([
            'role_id' => 2,
        ]);
        $this->actingAs($user);

        $img_admin = Image::create();
        $p_admin = Profile::create([
          'image_id' => $img_admin->id,
          'user_id' => $user->id,
        ]);

        // $admin = new AdminMiddleware();

        // $request = Request::create(route('admin.users.index'),'GET');

        $user_r = factory(User::class)->create([
            'name' => 'jose2',
            'role_id' => 1,
        ]);

        $image = Image::create();

        Profile::create([
          'image_id' => $image->id,
          'user_id' => $user_r->id,
        ]);



        // $admin->handle($request, function(){});
        $this->get(route('admin.users.index'))
            ->assertStatus(200)
            ->assertSee('jose2')
            ->assertSee('User')
            ->assertSee('default.jpg');
    }

     /**
    *@test
    */
    function it_registrations_user_in_webapp(){
      // $this->withoutExceptionHandling();
      Role::generate_roles();
      $user = factory(User::class)
            ->create([
          'name' => 'user1',
          'email' => 'user1@gmail.com',
          'password' => '12345d',

        ]);
      $image = Image::create();

      Profile::create([
        'image_id' => $image->id,
        'user_id' => $user->id,
      ]);

      $this->post('register',[$user])
        ->assertRedirect(route('index'));

      $this->assertDatabaseHas('users', [
        'name' => 'user1',
        'email' => 'user1@gmail.com',
        'password' => '12345d',
      ]);
    }

  /**
  *@test
  */
  function it_validate_email_in_registration_user(){
    // $this->withoutExceptionHandling();
      Role::generate_roles();
      $user = factory(User::class)
            ->create([
          'name' => 'user1',
          'email' => '',
          'password' => '12345d',

        ]);
      $this->from('register')
        ->post('register',[$user])
        ->assertRedirect(route('register'))
        ->assertSessionHasErrors(['email']);

      // $this->assertEquals(0, User::count());
  }

   /**
  *@test
  */
   function it_validate_name_in_registrations_user(){
      Role::generate_roles();
      $user = factory(User::class)
            ->create([
          'name' => 'user1',
          'email' => '',
          'password' => '12345d',

        ]);

      $this->from('register')
        ->post('register',[$user])
        ->assertRedirect(route('register'))
        ->assertSessionHasErrors(['name']);
   }

  /**
  *@test
  */
  function it_update_the_profile_user_in_account(){
  }

}
