<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SourceDataBeratTest extends TestCase
{
    /**
     * test struktur response json
     *
     * @return void
     */
    public function test_response_structure()
    {
        $res = $this->json('get', 'source/berat');

        $res->assertStatus(200)
        ->assertJsonStructure([
            'draw', 'recordsTotal', 'recordsFiltered', 'data', 'queries', 'input'
        ]);
    }
}
