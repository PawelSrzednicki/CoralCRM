<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTicket;
use App\Repositories\TicketRepository;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    private $ticket;

    function __construct(TicketRepository $ticket) {		
			$this->ticket = $ticket;		
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if (Auth::user() &&  Auth::user()->admin == 1) {
         $data = $this->ticket->all();
        }
        else{ 
         $data = $this->ticket->getAllByUser(Auth::id());
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicket $request)
    {   

         $data = $request;
        $data['owner_id'] = Auth::id();
        
        $ticket = $this->ticket->store($data);

        return response()->json($ticket, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', App\Models\Ticket::class);

        $data = $this->ticket->getById($id);

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
        $this->authorize('update', App\Models\Ticket::class);

         $data = $request;
        $data['owner_id'] = Auth::id();

        $this->ticket->update($id,$data);

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
        $this->authorize('delete', App\Models\Ticket::class);

        $this->ticket->delete($id);

        return response()->json($data, 200);
    }
    

    public function create()
    {
        $data = $this->ticket->create();

        return response()->json($data, 200);
    }
}
