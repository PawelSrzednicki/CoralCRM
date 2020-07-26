<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class ContactRepository {
 
    public function all(){
       
        $contact = \App\Models\Contact::all();

        return $contact;
    }

    public function getAllByUser($user){
        
        $contact = \App\Models\Contact::where('assignedTo','=', $user)->get();
        
        return $contact;
    }
       
    public function getById($id){  

        $contact=\App\Models\Contact::with(['contact_status','contact_lead_status','lifecyclestage','companies'])->where('id',$id)->get(); 
      
        return $contact;
    }
   
    public function store($data){
      
       $contact=\App\Models\Contact::create($data->except(['contact_lead_status','contact_status','lifecyclestage','companies']));
       $contact->contact_status()->sync($data['contact_status']);
       $contact->contact_lead_status()->sync($data['contact_lead_status']);   
       $contact->lifecyclestage()->sync($data['lifecyclestage']);  
       $contact->companies()->sync($data['companies']);  

       return $contact;
    }
  
    public function update($id,$data){
         
         $contact=\App\Models\Contact::findOrFail($id);
         $contact->update($data->except(['contact_lead_status','contact_status','lifecyclestage','companies']));
         $contact->contact_status()->sync($data['contact_status']);
         $contact->contact_lead_status()->sync($data['contact_lead_status']);   
         $contact->lifecyclestage()->sync($data['lifecyclestage']);  
         $contact->companies()->sync($data['companies']);   

         return $contact;
    }

    public function delete($id){

        $contact=\App\Models\Contact::destroy($id);

        return $contact;
    }

     public function create(){
        
        $ContactStatus = \App\Models\PltblContactStatus::all();
        $LifecycleStage = \App\Models\PltblLifecycleStage::all();
        $ContactLeadStatus = \App\Models\PltblContactLeadStatus::all();
        $Company = \App\Models\Company::all();
        
        $response = ['contact_status'=>$ContactStatus, 'lifecyclestage'=>$LifecycleStage,'companies'=>$Company, 'contact_lead_status'=>$ContactLeadStatus];
        return $response;
     }
}

