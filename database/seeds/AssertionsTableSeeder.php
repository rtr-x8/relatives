<?php

use Illuminate\Database\Seeder;

class AssertionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Assertion::class, 50)->create();
    }
}
