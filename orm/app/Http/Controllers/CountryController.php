<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CountryRequest;
use App\Models\Country;
class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $country=Country::all();
          return response()->json([
            'success'=>true,
            'countries'=>$country
        ]);
    }



    public function store(CountryRequest $request)
    {
        $data=$request->validated();
        $country=Country::create($data);
        return response()->json([
            'success'=>true,
            'country'=>$country
        ]);

    }


    public function show(string $id)
    {
         $country=Country::find($id);
          if (!$country) {
        return response()->json([
            'success' => false,
            'message' => 'Country not found'
        ], 404);
    }

          return response()->json([
            'success'=>true,
            'country'=>$country
        ]);
    }


    public function update(CountryRequest $request, string $id)
    {
         $country=Country::find($id);
         if (!$country) {
        return response()->json([
            'success' => false,
            'message' => 'Country not found'
        ], 404);
    }
         $data=$request->validated();

         $country->update($data);
          return response()->json([
            'success'=>true,
            'country'=>$country
        ]);
    }


    public function destroy(string $id)
    {
        $country=Country::find($id);
           if (!$country) {
        return response()->json([
            'success' => false,
            'message' => 'Country not found'
        ], 404);
    }
    $country->delete();
 
          return response()->json([
            'success'=>true,
            'country'=>$country
        ]);
    }
}
