<?php


namespace App\Http\Controllers\APIs\V1;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Filters\V1\StaffFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Http\Requests\StaffUpdateRequest;
use App\Http\Resources\V1\StaffResource;
use App\Http\Resources\V1\StaffCollection;


class StaffController extends Controller
{

    public function arrayContainsString($array, $searchString) {
        foreach ($array as $value) {
            if (is_array($value)) {
                // If the current value is an array, recursively search within it.
                if ($this->arrayContainsString($value, $searchString)) {
                    return true;
                }
            } elseif ($value === $searchString) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $filter = new StaffFilter();

        $query_items = $filter->transform($request); //['column', 'operator', 'value']
        //


        if(count($query_items) == 0)
        {
            $staff = Staff::with('staff_type')->where($query_items)->paginate();
            return new StaffCollection($staff->appends($request->query()));
        }
        elseif($this->arrayContainsString($query_items, "staff_types.name"))
        {
            $staff = Staff::with('staff_type')->whereHas('staff_type', function ($query) use (&$query_items) {
                $query->where($query_items);
            })->paginate();

            return new StaffCollection($staff->appends($request->query()));

        }
        else
        {

            $staff = Staff::with('staff_type')->where($query_items)->paginate();
            return new StaffCollection($staff->appends($request->query()));

        }

       

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
    public function store(StaffRequest $request)
    {
        //
        return new StaffResource(Staff::create($request->all()));

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
    public function update(StaffUpdateRequest $request, Staff $staff)
    {
        //
        $staff->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        //
    }
}
