<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class LeadRepository {
 
  public function all(){
       
        $lead = \App\Models\Lead::all();

        return $lead;
    }

    public function getAllByUser($user){
        
        $lead = \App\Models\Lead::where('assignedTo','=', $user)->get();
        
        return $lead;
    }
       
    public function getById($id){  

        $lead=\App\Models\Lead::with('lead_status','lead_type','sales_pipeline')->where('id',$id)->get(); 
      
        return $lead;
    }
   
    public function store($data){
      
       $lead=\App\Models\Lead::create($data->except(['lead_status','lead_type','sales_pipeline']));
       $lead->lead_status()->sync([$data['lead_status']]);
       $lead->lead_type()->sync([$data['lead_type']]);   
       $lead->sales_pipeline()->sync([$data['sales_pipeline']]);   

       return $lead;
    }
  
    public function update($id,$data){
         
         $lead=\App\Models\Lead::findOrFail($id);
         $lead=\App\Models\Lead::update($data->except(['lead_status','lead_type','sales_pipeline']));
         $lead->lead_status()->sync([$data['lead_status']]);
         $lead->lead_type()->sync([$data['lead_type']]);   
         $lead->sales_pipeline()->sync([$data['sales_pipeline']]);     

          return $lead;
    }

    public function delete($id){

        $lead=\App\Models\Lead::destroy($id);

        return $lead;
    }

     public function create(){
        
        $LeadStatus = \App\Models\LeadStatus::all();
        $LeadType = \App\Models\LeadType::all();
        $SalesPipeline = \App\Models\SalesPipeline::all();
        
        $response = ['lead_status'=>$LeadStatus, 'lead_type'=>$LeadType, 'sales_pipeline'=>$SalesPipeline];
        return $response;
     }
}