<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class TicketRepository {
 
  public function all(){
       
        $ticket = \App\Models\Ticket::all();

        return $ticket;
    }

    public function getAllByUser($user){
        
        $ticket = \App\Models\Ticket::where('assignedTo','=', $user)->get();
        
        return $ticket;
    }
       
    public function getById($id){  

        $ticket=\App\Models\Ticket::with('ticket_status','ticket_priority')->where('ticket_id',$id)->get(); 
      
        return $ticket;
    }
   
    public function store($data){
      
       $ticket=\App\Models\Ticket::create($data->except(['ticket_status','ticket_priority']));
       $ticket->ticket_status()->sync($data['ticket_status']);
       $ticket->ticket_type()->sync($data['ticket_priority']);

       return $ticket;
    }
  
    public function update($id,$data){
         
         $ticket=\App\Models\Ticket::findOrFail($id);
         $ticket=\App\Models\Ticket::update($data->except(['ticket_status','ticket_priority']));
         $ticket->ticket_status()->sync($data['ticket_status']);
         $ticket->ticket_type()->sync($data['ticket_priority']); 

          return $ticket;
    }

    public function delete($id){

        $ticket=\App\Models\Ticket::destroy($id);

        return $ticket;
    }

     public function create(){
        
        $TicketStatus = \App\Models\TicketStatus::all();
        $TicketPriority = \App\Models\TicketPriority::all();
        
        $response = ['ticket_status'=>$TicketStatus, 'ticket_priority'=>$TicketPriority];
        return $response;
     }
}