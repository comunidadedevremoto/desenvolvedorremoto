<?php

namespace Tests\Feature;

use App\Technology;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TechnologyTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void {
        parent::setUp();
        $user = factory(User::class)->make();
        $this->actingAs($user);
    }

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

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateATechnology()
    {
        $factoryCreated = factory(Technology::class, 1)->create()->first();
        $response = $this->put("/api/technologies/{$factoryCreated->id}", [
            'name' => "JAVA",
            'description' => "Linguagem JAVA"
        ]);
        $responseData = $response->json();
        $response->assertStatus(200);
        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('name', $responseData);
        $this->assertArrayHasKey('description', $responseData);
        $this->assertArrayHasKey('created_at', $responseData);
        $this->assertArrayHasKey('updated_at', $responseData);
        $this->assertNotEmpty($responseData['id']);
        $this->assertNotEmpty($responseData['created_at']);
        $this->assertNotEmpty($responseData['updated_at']);
        $this->assertEquals('JAVA', $responseData['name']);
        $this->assertEquals('Linguagem JAVA', $responseData['description']);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUpdateATechnologyNotFoundError()
    {
        $response = $this->put('/api/technologies/99999', [
            'name' => "JAVA",
            'description' => "Linguagem JAVA"
        ]);
        $response->assertStatus(404);
        $responseData = $response->json();
        $this->assertArrayHasKey('message', $responseData);
        $this->assertNotEmpty($responseData['message']);
        $this->assertStringContainsStringIgnoringCase('Tecnologia não encontrada', $responseData['message']);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowATechnology()
    {
        $factoryCreated = factory(Technology::class, 1)->create()->first();
        $response = $this->get("/api/technologies/{$factoryCreated->id}");
        $responseData = $response->json();
        $response->assertStatus(200);
        $this->assertArrayHasKey('id', $responseData);
        $this->assertArrayHasKey('name', $responseData);
        $this->assertArrayHasKey('description', $responseData);
        $this->assertArrayHasKey('created_at', $responseData);
        $this->assertArrayHasKey('updated_at', $responseData);
        $this->assertNotEmpty($responseData['id']);
        $this->assertNotEmpty($responseData['created_at']);
        $this->assertNotEmpty($responseData['updated_at']);
        $this->assertEquals($factoryCreated->name, $responseData['name']);
        $this->assertEquals($factoryCreated->description, $responseData['description']);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testShowATechnologyNotFoundError()
    {
        $response = $this->get('/api/technologies/99999');
        $response->assertStatus(404);
        $responseData = $response->json();
        $this->assertArrayHasKey('message', $responseData);
        $this->assertNotEmpty($responseData['message']);
        $this->assertStringContainsStringIgnoringCase('Tecnologia não encontrada', $responseData['message']);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDeleteATechnology()
    {
        $factoryCreated = factory(Technology::class, 1)->create()->first();
        $response = $this->delete("/api/technologies/{$factoryCreated->id}");
        $response->assertStatus(200);
        $responseData = $response->json();
        $this->assertArrayHasKey('message', $responseData);
        $this->assertNotEmpty($responseData['message']);
        $this->assertStringContainsStringIgnoringCase('sucesso', $responseData['message']);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testDeleteATechnologyNotFoundError()
    {
        $response = $this->delete('/api/technologies/99999');
        $response->assertStatus(404);
        $responseData = $response->json();
        $this->assertArrayHasKey('message', $responseData);
        $this->assertNotEmpty($responseData['message']);
        $this->assertStringContainsStringIgnoringCase('Tecnologia não encontrada', $responseData['message']);
    }
}
