<?php

namespace App\Http\Controllers\APIs;

use App\Models\StaffType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaffTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        return StaffType::all();
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StaffType $staffType)
    {
        //
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