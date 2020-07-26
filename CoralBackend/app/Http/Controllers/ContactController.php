<?php

namespace App\Http\Controllers;

use App\Repositories\ContactRepository;
use App\Http\Requests\StoreContact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private $contact;

    function __construct(ContactRepository $contact) {		
			$this->contact = $contact;		
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if (Auth::user() &&  Auth::user()->admin == 1) {
            $data = $this->contact->all();
        }
        else{ 
         $data = $this->contact->getAllByUser(Auth::id());
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreContact $request)
    {   
        $data = $request;
        $data['owner_id'] = Auth::id();
        
        $contact = $this->contact->store($data);

        return response()->json($contact, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', \App\Models\Contact::class);
        $data = $this->contact->getById($id);

        return $data;
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
        $this->authorize('update', \App\Models\Contact::class);

        $data = $request;
        $data['owner_id'] = Auth::id();

        $this->contact->update($id,$data);

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
        $this->authorize('delete', \App\Models\Contact::class);

        $this->contact->delete($id);

        return response()->json($data, 200);
    }
    

    public function create()
    {
        $data = $this->contact->create();

        return response()->json($data, 200);
    }
}
