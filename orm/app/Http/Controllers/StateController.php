<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StateRequest;
use App\Models\State;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         $state = State::with(['country:id,country_name'])->get();
          return response()->json([
            'success'=>true,
            'state'=>$state
        ]);

    }


    public function store(StateRequest $request)
    {
        $data=$request->validated();
        $state=State::create($data);
        return response()->json([
            'success'=>true,
            'state'=>$state
        ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

         $state = State::with(['country:id,country_name'])->find($id);
          return response()->json([
            'success'=>true,
            'state'=>$state
        ]);
    }


    public function update(StateRequest $request, string $id)
    {
         $state=State::find($id);
         if(!$state){
            return response()->json([
            'success'=>false,
            'state'=>'not found'
        ]);
         }
           $data=$request->validated();
           $state->update($data);
            return response()->json([
            'success'=>true,
            'state'=>$state
        ]);
    }


    public function destroy(string $id)
    {
         $state=State::find($id);
          if(!$state)
            {
            return response()->json([
            'success'=>false,
            'state'=>'not found']);
            }
            $state->delete();
             return response()->json([
            'success'=>true,
            'message'=>'date delete successfully',
            'state'=>$state
        ]);

    }
}
