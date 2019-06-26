<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Artisan;
use App\User;
use App\Assertion;

class AssertionTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:refresh');
        factory(User::class, 1)->create();
        factory(Assertion::class, 1)->create();
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

    /**
     * @test
     * 正常なupdate
     *
     * @return void
     */
    public function valid_update()
    {
        $assertion = Assertion::first();
        $this->put(route("assertions.update", $assertion->id), [
            "body" => "asdfdd"
        ])->assertStatus(200);
    }

    /**
     * @test
     * 正常でないupdate 1
     *
     * @return void
     */
    public function invalid_update_without_body()
    {
        $assertion = Assertion::first();
        $this->put(route("assertions.update", $assertion->id), [
            "body" => ""
        ])->assertStatus(422)->assertExactJson([
            "message" => "The given data was invalid.",
            "errors" => [
                "body" => [
                    "validation.required"
                ]
            ]
        ]);
    }

    /**
     * @test
     * 正常でないupdate 2
     *
     * //TODO もう少し詳しく
     *
     * @return void
     */
    public function invalid_update_wthout_assertion()
    {
        $this->put(route("assertions.update", 99999), [
            "body" => "adadsadsa"
        ])->assertStatus(404);

        $this->put(route("assertions.update", 99999), [
            "body" => ""
        ])->assertStatus(422);
    }

    /**
     * @test
     * 正常な削除
     *
     * @return void
     */
    public function delete_assertion()
    {
        $assertion = Assertion::first();
        $count = Assertion::count();
        $this->delete(route("assertions.destroy", $assertion->id))
            ->assertStatus(204);
        $this->assertEquals($count - 1, Assertion::count());
    }

    /**
     * @test
     * 正常でない削除
     *
     * @return void
     */
    public function invalid_delete_assertion()
    {
        $assertion = Assertion::latest()->first();
        $id = $assertion->id + 10;
        $this->delete(route("assertions.destroy", $id))
            ->assertStatus(404);
    }
}
