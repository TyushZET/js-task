<?php

namespace App\Http\Controllers\person;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Http\Requests\PersonUpdateRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people = Person::all();
        return $people;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        $data = $request->validated();
        $person = Person::create($data);
        return $person;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonUpdateRequest $request,Person $person)
    {
        $data = $request->validated();
        $person->update($data);
        return $person;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        $person->delete();
        return response([]);
    }
}
