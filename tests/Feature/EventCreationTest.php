<?php

namespace Tests\Feature;

use App\Models\Evenement;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventCreationTest extends TestCase
{
    use RefreshDatabase;

    public function test_organisateur_can_create_event(): void
    {
        $user = User::factory()->create(['role' => 'organisateur']);

        $data = [
            'titre' => 'Test Event',
            'description' => 'Une description',
            'date' => '2025-06-30',
            'lieu' => 'Paris',
        ];

        $response = $this->actingAs($user)->post('/evenements', $data);

        $response->assertRedirect(route('evenements.index', absolute: false));
        $response->assertSessionHas('success', 'Événement créé.');

        $this->assertDatabaseHas('evenements', $data + ['organisateur_id' => $user->id]);
    }
}
