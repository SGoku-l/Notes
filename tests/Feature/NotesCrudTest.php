<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Notes;
use Illuminate\Foundation\Testing\RefreshDatabase;

class NotesCrudTest extends TestCase
{
    use RefreshDatabase;

    
    public function a_logged_in_user_can_create_a_note()
    {
        
        $user = User::factory()->create();

        
        $this->actingAs($user);

        
        $response = $this->post('/notes', [
            'title' => 'Hlo',
            'content' => 'Testing',
        ]);

        
        $this->assertDatabaseHas('notes', [
            'title' => 'Hii',
            'content' => 'Testing',
            'user_id' => $user->id,
        ]);

        
        $response->assertRedirect('/notes');
    }

   
    public function a_logged_in_user_can_view_notes_list()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Notes::factory()->create(['user_id' => $user->id]);

        $response = $this->get('/notes');

        $response->assertStatus(200);
        $response->assertSee('Notes'); 
    }
}
