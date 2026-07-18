<?php

namespace Tests\Feature;

use App\Models\Lead;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    /** @return array<string, mixed> */
    private function validContactPayload(array $overrides = []): array
    {
        return array_merge([
            'type' => Lead::TYPE_CONTACT,
            'name' => 'Awa Koné',
            'email' => 'awa@example.com',
            'message' => 'Bonjour, je souhaite un accompagnement digital.',
            'consent' => '1',
        ], $overrides);
    }

    public function test_valid_contact_submission_creates_a_lead(): void
    {
        $response = $this->post(route('contact.store'), $this->validContactPayload());

        $response->assertRedirect();
        $response->assertSessionHas('lead_success');
        $response->assertSessionHas('contact_success');

        $this->assertDatabaseHas('leads', [
            'email' => 'awa@example.com',
            'type' => Lead::TYPE_CONTACT,
        ]);
    }

    public function test_honeypot_blocks_bots_without_creating_a_lead(): void
    {
        $response = $this->post(route('contact.store'), $this->validContactPayload([
            'website' => 'http://spam.example',
        ]));

        $response->assertSessionHasErrors('website');
        $this->assertDatabaseCount('leads', 0);
    }

    public function test_consent_is_required(): void
    {
        $response = $this->post(route('contact.store'), $this->validContactPayload([
            'consent' => null,
        ]));

        $response->assertSessionHasErrors('consent');
        $this->assertDatabaseCount('leads', 0);
    }

    public function test_quote_requires_an_appointment(): void
    {
        $response = $this->post(route('contact.store'), $this->validContactPayload([
            'type' => Lead::TYPE_QUOTE,
        ]));

        $response->assertSessionHasErrors('appointment_at');
        $this->assertDatabaseCount('leads', 0);
    }
}
