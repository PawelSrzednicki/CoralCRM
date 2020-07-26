<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserRepository {
 
    public function all(){
       
        $user = \App\Models\User::all();

        return $user;
    }

    public function getAllByUser($user){
        
    }
       
    public function getById($id){  
        
       $user = \App\Models\User::find($id);

        return $user;
    }
   
    public function store($data){
        
        $password = Hash::make($data['password']);
        $user = \App\Models\User::create([$data->except(['password']),'password' => $password]);

        return $user;
    }
  
    public function update($id,$data){
        $password = Hash::make($data['password']);
        
        $user = \App\Models\User::findOrFail($id);
        $user->update([$data->except(['password']),'password' => $password]);

        return $user;
    }

    public function delete($id){

       $user=\App\Models\User::destroy($id);

        return $user;
    }

}