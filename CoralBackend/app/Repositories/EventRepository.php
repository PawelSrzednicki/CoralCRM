<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class EventRepository {
 
 public function all(){
       
        $event = \App\Models\Event::all();

        return $event;
    }

    public function getAllByUser($user){
        
        $event = \App\Models\Event::where('assignedTo','=', $user)->get();
        
        return $event;
    }
       
    public function getById($id){  

        $event=\App\Models\Event::with('event_type')->where('id',$id)->get(); 
      
        return $event;
    }
   
    public function store($data){
      
       $event=\App\Models\Event::create($data->except(['event_type']));
       $event->event_type()->sync([$data['event_type']]);
  
       return $event;
    }
  
    public function update($id,$data){
         
         $event=\App\Models\Event::findOrFail($id);
         $event=\App\Models\Event::update($data->except(['event_type']));
         $event->event_type()->sync([$data['event_type']]); 

          return $event;
    }

    public function delete($id){

        $event=\App\Models\Event::destroy($id);

        return $event;
    }

     public function create(){
        
        $EventType = \App\Models\EventType::all();
        
        $response = ['event_type'=>$EventType];
        return $response;
     }
}