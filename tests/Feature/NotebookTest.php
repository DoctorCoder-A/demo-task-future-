<?php

namespace Tests\Feature;

use App\Models\Notebook;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotebookTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_can_no_auth_user_be_get_list_notebooks()
    {
        Notebook::factory()->count(20)->create();
        $response = $this->get(route('notebook.index'));
        $response->assertOk();
        $response->assertJsonCount(5);
    }

    /** @test */
    public function a_can_be_auth_user_add_notebook()
    {
        $user = $this->createUser();
        $data = $this->getDataForNewNotebook();

        $this->actingAs($user);
        $response = $this->post(route('notebook.store'), $data);

        $response->assertOk();
        $this->assertCount(1, Notebook::all());
        $this->assertEquals($data['email'], Notebook::first()->email);
    }

    /** @test */
    public function a_can_be_no_auth_user_add_notebook()
    {
        $user = $this->createUser();

        $response = $this->post(route('notebook.store'), $this->getDataForNewNotebook());

        $response->assertStatus(401);
        $this->assertCount(0, Notebook::all());
    }

    /** @test */
    public function a_email_is_required()
    {
        $user = $this->createUser();
        $data = $this->getDataForNewNotebook();
        unset($data['email']);

        $this->actingAs($user);
        $response = $this->post(route('notebook.store'), $data);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /** @test */
    public function a_photo_is_nullable()
    {
        $user = $this->createUser();
        $data = $this->getDataForNewNotebook();
        unset($data['photo']);

        $this->actingAs($user);
        $response = $this->post(route('notebook.store'), $data);

        $response->assertOk();
        $this->assertCount(1, Notebook::all());
        $this->assertEquals($data['email'], Notebook::first()->email);
    }

    private function createUser(): User
    {
        return User::factory()->create([
            'name' => 'author',
            'email' => 'email@email',
            'password' => '1234567'
        ]);
    }

    private function getDataForNewNotebook(): array
    {
        return [
            'full_name' =>  'test_full_name',
            'company' => 'test_company',
            'email' => 'test_email@email',
            'birthday' => '01/01/2001',
            'photo' => 'test_photo',
            'phone' => '1111111111',//10
        ];
    }
}
