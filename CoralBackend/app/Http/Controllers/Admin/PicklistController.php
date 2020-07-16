<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

class PicklistController extends Controller
{
    private $prefix = 'pltbl_';

    public function index(){

       $tables = DB::select("SHOW TABLES LIKE '{$this->prefix}%'");
       $tables = array_map('current',$tables);

       return $tables;

    }

    public function content($picklist){

      $tables = DB::table($picklist)->get();

      return  $tables;
    }

    public function add($picklist,Request $request){
      $name = $request->input('value');
      $description = $request->input('description');

      $tables = DB::table($picklist)->insert(['value'=>$name, 'description'=>$description]);

      return $tables;
    }
    public function show($picklist,$id){

        $tables = DB::table($picklist)->select('*')->where('id', $id)->get();

        return $tables;
    }

    public function update(Request $request,$picklist,$id){

      $name = $request->input('value');
      $description = $request->input('description');

      $tables = DB::table($picklist)->where('id', $id)->update(['value'=>$name, 'description'=>$description]);

      return response()->json($tables, 200);
    }

    public function delete($picklist, $id){

      $tables = DB::table($picklist)->where('id', $id)
              ->delete();

      return $tables;
    }

}
