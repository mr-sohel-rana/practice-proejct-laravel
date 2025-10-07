<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommonRequest;
use App\Models\Student;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         $students=Student::get();

       return response()->json([
                'success'=>true,
                'student'=>$students,]);



       }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommonRequest $request)
{
    $validated = $request->validated();

    $student = Student::create([
        'name' => $validated['name'],
        'email' => $validated['email'],
        'password' => bcrypt($validated['password']),
    ]);

    return response()->json([
        'success' => true,
        'student' => $student
    ]);
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CommonRequest $request, string $id)
    {
         $student=Student::find($id);
         if(!$student){
            return ("student not found");
         }

         $validated=$request->validated();
         $student->update($validated);
         return response()->json([
            'success'=>true,
            'student'=>$student
         ]);

    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(string $id)
{
    $student = Student::find($id);

    if (!$student) {
        return response()->json([
            'success' => false,
            'message' => 'Student not found',
        ], 404);
    }

    $student->delete();

    return response()->json([
        'success' => true,
        'message' => 'Student deleted successfully',
    ], 200);
}

}
