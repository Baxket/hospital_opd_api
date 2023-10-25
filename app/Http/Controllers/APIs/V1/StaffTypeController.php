<?php

namespace App\Http\Controllers\APIs\V1;

use App\Models\StaffType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffTypeRequest;
use App\Http\Resources\V1\StaffTypeResource;
use App\Http\Resources\V1\StaffTypeCollection;

class StaffTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return new StaffTypeCollection(StaffType::paginate());

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
    public function store(StaffTypeRequest $request)
    {
        //

        return new StaffTypeResource(StaffType::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(StaffType $staffType)
    {
        //
        return new StaffTypeResource($staffType);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StaffType $staffType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StaffType $staffType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StaffType $staffType)
    {
        //
    }
}
