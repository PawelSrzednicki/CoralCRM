<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class TaskRepository {
 
 public function all(){
       
        $task = \App\Models\Task::all();

        return $task;
    }

    public function getAllByUser($user){
        
        $task = \App\Models\Task::where('assignedTo','=', $user)->get();
        
        return $task;
    }
       
    public function getById($id){  

        $task=\App\Models\Task::where('task_id',$id)->get(); 
      
        return $task;
    }
   
    public function store($data){
      
       $task=\App\Models\Task::create([$data]);

       return $task;
    }
  
    public function update($id,$data){
         
         $task=\App\Models\Task::findOrFail($id);
         $task=\App\Models\Task::update([$data]);
       
          return $task;
    }

    public function delete($id){

        $task=\App\Models\Task::destroy($id);

        return $task;
    }

     public function create(){
         
     }
}