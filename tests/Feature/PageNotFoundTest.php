<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PageNotFoundTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_404()
    {
        $this->get('/randomlink')
        ->assertStatus(404)
        ->assertSeeText('404');
    }
}
