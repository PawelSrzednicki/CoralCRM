<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $user;

    function __construct(UserRepository $user) {		
			$this->user = $user;		
		}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getprofile($id)
    {
        
        $data = $this->user->getById($id);

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
        $data = $request->all();

        $this->user->update($id,$data);

        return response()->json($data, 200);
    }
    
     public function user(Request $request)
    {
        return $request->user();
    }
}
