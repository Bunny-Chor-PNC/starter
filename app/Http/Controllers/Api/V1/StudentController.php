<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Requests\Student\StoreRequest;
use App\Http\Requests\Student\UpdateRequest;
use App\Http\Resources\StudentResource;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = Student::all();
        return response()->json([
            'message' => 'Students retrieved successfully',
            'data'=> StudentResource::collection($student),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        // $validated['password'] = bcrypt($validated['password']);
        $student = Student::create($validated);
        return response()->json([
            'message' => 'User created successfully.',
            'data' => $student
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        if(!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json([
            'message' => 'Student retrieved successfully',
            'data' => $student
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $student = Student::find($id);
        if(!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $validated = $request->validated();
        $student->update($validated);
        return response()->json([
            'message' => 'student updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        $student->delete();
        return response()->json(['message' => 'Student deleted successfully.']);
    }
}
