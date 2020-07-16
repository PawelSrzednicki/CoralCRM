<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreTask;
use App\Repositories\TaskRepository;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    private $task;

    function __construct(TaskRepository $task) {		
			$this->task = $task;		
		}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if (Auth::user() &&  Auth::user()->admin == 1) {
         $data = $this->task->all();
        }
        else{ 
         $data = $this->task->getAllByUser(Auth::id());
        }
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTask $request)
    {   

        $data = $request;
        $data['assignedTo'] = Auth::id();
        
        $task = $this->task->store($data);

        return response()->json($task, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->authorize('view', Task::class);

        $data = $this->task->getById($id);

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
        $this->authorize('update', Task::class);

        $data = $request->all();
        $data['assignedTo'] = Auth::id();

        $this->task->update($id,$data);

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
        $this->authorize('delete', Task::class);

        $this->task->delete($id);

        return response()->json($data, 200);
    }
    

    public function create()
    {
        $data = $this->task->create();

        return response()->json($data, 200);
    }
}
