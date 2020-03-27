<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TechnologyTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCreateATechnology()
    {
        $response = $this->post('/api/technologies', [
            'name' => "PHP",
            'description' => "Linguagem PHP"
        ]);
        $response->assertStatus(201);
        $responseData = $response->json();
        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('name', $responseData);
        $this->assertArrayHasKey('description', $responseData);
        $this->assertArrayHasKey('created_at', $responseData);
        $this->assertArrayHasKey('updated_at', $responseData);
        $this->assertNotEmpty($responseData['id']);
        $this->assertNotEmpty($responseData['created_at']);
        $this->assertNotEmpty($responseData['updated_at']);
        $this->assertEquals('PHP', $responseData['name']);
        $this->assertEquals('Linguagem PHP', $responseData['description']);
    }
}
