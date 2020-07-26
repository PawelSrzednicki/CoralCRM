<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\LeadRepository;
use App\Http\Requests\StoreLead;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    private $lead;

    function __construct(LeadRepository $lead) {		
			$this->lead = $lead;		
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if (Auth::user() &&  Auth::user()->admin == 1) {
           $data = $this->lead->all();
        }
        else{ 
           $data = $this->lead->getAllByUser(Auth::id());
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLead $request)
    {   
 
        $data = $request;
        $data['owner_id'] = Auth::id();
        
        $lead = $this->lead->store($data);

        return response()->json($lead, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', App\Models\Lead::class);

        $data = $this->lead->getById($id);

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $this->authorize('update', App\Models\Lead::class);

         $data = $request;
        $data['owner_id'] = Auth::id();

        $this->lead->update($id,$data);

        return response()->json($data, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $this->authorize('delete', App\Models\Lead::class);

        $this->lead->delete($id);

        return response()->json($data, 200);
    }
    

    public function create()
    {
        $data = $this->lead->create();

        return response()->json($data, 200);
    }
}
