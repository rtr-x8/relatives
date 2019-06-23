<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Artisan;

class AssertionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
    }

    /**
     * @test
     * indexページには最新のpostがある
     *
     * @return void
     */
    public function viewable_latest_assertions_at_index()
    {
        $this->get(route("assertions.index"))->assertStatus(200);
    }
}
