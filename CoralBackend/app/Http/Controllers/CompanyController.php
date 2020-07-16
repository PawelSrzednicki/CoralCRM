<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCompany;
use App\Repositories\CompanyRepository;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{   
    private $company;

    function __construct(CompanyRepository $company) {		
			$this->company = $company;		
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        if (Auth::user() &&  Auth::user()->admin == 1) {
            $data = $this->company->all();
        }
        else{ 
         $data = $this->company->getAllByUser(Auth::id());
        }

        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request)
    {   

        $data = $request;
        $data['assignedTo'] = Auth::id();
        
        $company = $this->company->store($data);

        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Company::class);
 
        $data = $this->company->getById($id);
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
        $this->authorize('update', Company::class);
      
        $data = $request;
        $data['assignedTo'] = Auth::id();

        $this->company->update($id,$data);

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
        $this->authorize('delete', Company::class);

        $this->company->delete($id);

        return response()->json($data, 200);
    }
    

    public function create()
    {
        $data = $this->company->create();

        return response()->json($data, 200);
    }

}
