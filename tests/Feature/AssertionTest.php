<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Artisan;
use App\User;

class AssertionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
        factory(App\User::class, 1);
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

    /**
     * @test
     * 正常なストア
     *
     * @return void
     */
    public function valid_store()
    {
        $body = "aaaaa";
        $this->post(route("assertions.store", [
            "body" => $body
        ]))->assertStatus(200)->assertJson([
            "user_id" => User::first()->id,
            "body" => $body
        ]);
    }

    /**
     * @test
     * 正常でないストア
     *
     * @return void
     */
    public function invalid_store()
    {
        $this->post(route("assertions.store", [
            "body" => ""
        ]))->assertStatus(422)->assertExactJson([
            "message" => "The given data was invalid.",
            "errors" => [
                "body" => [
                    "validation.required"
                ]
            ]
        ]);

    }
}
