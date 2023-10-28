<?php


namespace App\Http\Controllers\APIs\V1;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Filters\V1\StaffFilter;
use App\Http\Requests\StaffRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\V1\StaffResource;
use App\Http\Requests\StaffUpdateRequest;
use App\Http\Resources\V1\StaffCollection;
use App\Http\Resources\V1\StaffTypeResource;

class StaffController extends Controller
{


     function __construct()
    {
        $this->middleware('auth:staff', ['only' => ['update','edit']]);
        $this->middleware('auth:sanctum', ['only' => ['create','store', 'index']]);
      
    }

    public static function generateStaffNum($id)
    {
        return 'S' .'1'. str_repeat('0', 4 - strlen(strval($id))) . strval($id). date('y');
    }


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


        $data = $request->all();
        $data['staff_num'] = "N/A";

        $data['password'] = bcrypt($request->password);
        $staff = Staff::create($data);
        $staff->staff_num = $this::generateStaffNum($staff->id);
        $staff->save();

        
        $adminToken = $staff->createToken('admin-token', ['create', 'delete', 'update']);
    

        return array(
            'id' => $staff->id,
            'staffNum' => $staff->staff_num,
            'fullName' => $staff->full_name,
            'phoneNumber' => $staff->id,
            'dob' => $staff->dob,
            'residence' => $staff->residence,
            'email' => $staff->email,
            'staffType' => new StaffTypeResource($staff->staff_type),
            "token" => $adminToken,


        );
         

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
