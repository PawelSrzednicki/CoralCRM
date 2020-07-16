<?php

namespace App\Repositories;


use Illuminate\Support\Facades\DB;

class CompanyRepository {
 
    public function all(){
       
        $companies = \App\Models\Company::all();

        return $companies;
    }

    public function getAllByUser($user){
        
        $company = \App\Models\Company::where('assignedTo','=', $user)->get();
        
        return $company;
    }
       
    public function getById($id){  

        $company=\App\Models\Company::with(['company_status','industry'])->where('id',$id)->get(); 
      
        return $company;
    }
   
    public function store($data){
      
       $company=\App\Models\Company::create($data->except(['industry','company_status']));
       $company->company_status()->sync([$data['company_status']]);
       $company->industry()->sync([$data['industry']]);   

       return $company;
    }
  
    public function update($id,$data){
         
         $company=\App\Models\Company::findOrFail($id);
         $company->update($data->except(['industry','company_status']));
         $company->company_status()->sync([$data['company_status']]);
         $company->industry()->sync([$data['industry']]);  

          return $company;
    }

    public function delete($id){

        $company=\App\Models\Company::destroy($id);

        return $company;
    }

     public function create(){
        
        $Status = \App\Models\CompanyStatus::all();
        $Industry = \App\Models\Industry::all();
        
        $response = ['company_status'=>$Status, 'industry'=>$Industry];
        return $response;
     }
}

