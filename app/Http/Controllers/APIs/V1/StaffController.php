<?php


namespace App\Http\Controllers\APIs\V1;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Services\V1\StaffQuery;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\StaffResource;
use App\Http\Resources\V1\StaffCollection;


class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new StaffQuery();

        $query_items = $filter->transform($request); //['column', 'operator', 'value']
        //

        if(count($query_items) == 0)
        {
            return new StaffCollection(Staff::paginate());

        }
        else
        {
            return new StaffCollection(Staff::where($query_items)->paginate());

        }

        Staff::where($query_items);

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
    public function show(Staff $staff)
    {
        //

        return new StaffResource($staff);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
