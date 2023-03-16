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
}
