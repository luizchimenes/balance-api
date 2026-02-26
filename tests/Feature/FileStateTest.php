<?php

namespace Tests\Feature;

use Tests\TestCase;

class FileStateTest extends TestCase
{
    public function test_state_persists_within_process(): void
    {
        $this->post('/reset')->assertOk()->assertSeeText('OK');

        $this->postJson('/event', [
            'type' => 'deposit',
            'destination' => '100',
            'amount' => 10,
        ])->assertCreated()->assertJson([
            'destination' => [
                'id' => '100',
                'balance' => 10,
            ],
        ]);

        $this->postJson('/event', [
            'type' => 'deposit',
            'destination' => '100',
            'amount' => 10,
        ])->assertCreated()->assertJson([
            'destination' => [
                'id' => '100',
                'balance' => 20,
            ],
        ]);

        $this->get('/balance?account_id=100')
            ->assertOk()
            ->assertSeeText('20');
    }

    public function test_reset_clears_state(): void
    {
        $this->post('/reset')->assertOk()->assertSeeText('OK');

        $this->postJson('/event', [
            'type' => 'deposit',
            'destination' => '100',
            'amount' => 10,
        ])->assertCreated();

        $this->post('/reset')->assertOk()->assertSeeText('OK');

        $this->get('/balance?account_id=100')
            ->assertStatus(404)
            ->assertSeeText('0');
    }
}
