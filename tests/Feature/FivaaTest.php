<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FivaaTest extends TestCase
{
    /**
     * tes hasil fungsi fivaa.
     *
     * @return void
     */
    public function test_result()
    {
        $default = [
            "4466666",
            "335555",
            "22444",
            "1133",
            "002",
        ];

        $this->assertEquals($default, fivaa(5));
    }
}
