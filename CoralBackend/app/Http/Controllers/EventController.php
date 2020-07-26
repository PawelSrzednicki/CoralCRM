<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreEvent;
use App\Repositories\EventRepository;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    private $event;

    function __construct(EventRepository $event) {		
			$this->event = $event;		
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
          if (Auth::user() &&  Auth::user()->admin == 1) {
            $data = $this->event->all();
        }
        else{ 
         $data = $this->event->getAllByUser(Auth::id());
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvent $request)
    {   
 
         $data = $request;
        $data['owner_id'] = Auth::id();
        
        $event = $this->event->store($data);

        return response()->json($event, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', \App\Models\Event::class);
        
        $data = $this->event->getById($id);

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
        $this->authorize('update', \App\Models\Event::class);

        $data = $request;
        $data['owner_id'] = Auth::id();

        $this->event->update($id,$data);

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
        $this->authorize('delete', \App\Models\Event::class);

        $data = $this->event->delete($id);

        return response()->json($data, 200);
    }
    

    public function create()
    {
        $data = $this->event->create();

        return response()->json($data, 200);
    }
}
