<?php

namespace App\Http\Controllers\API;

use App\Assertion;
use App\User;
use Illuminate\Http\Request;
use  App\Http\Requests\StoreAssertionRequest;
use App\Http\Controllers\Controller;

class AssertionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Assertion::paginate(30);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssertionRequest $request)
    {
        $user = User::first();
        $request["user_id"] = $user->id;
        $assertion = Assertion::create($request->toArray());
        return response($assertion, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Assertion  $assertion
     * @return \Illuminate\Http\Response
     */
    public function show(Assertion $assertion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Assertion  $assertion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assertion $assertion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Assertion  $assertion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assertion $assertion)
    {
        //
    }
}
