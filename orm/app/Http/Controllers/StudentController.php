<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommonRequest;
use App\Models\Student;
class StudentController extends Controller
{
    
    public function index()
    {

         $students=Student::get();

       return response()->json([
                'success'=>true,
                'student'=>$students,]);
       }
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

    public function show(string $id)
    {
         $student=Student::find($id);
         if(!$student){
            return response()->json([
                'success'=>false,
                'message'=>'student not found'
            ]);
         }
  return response()->json([
                'success'=>true,
                'student'=>$student
            ]);

    }

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
