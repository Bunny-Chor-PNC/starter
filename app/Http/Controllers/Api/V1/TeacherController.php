<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Requests\Teacher\StoreRequest;
use App\Http\Requests\Teacher\UpdateRequest;
use function PHPUnit\Framework\returnArgument;
use App\Http\Resources\TeacherResource;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return response()->json(Teacher::all());
        $teachers = Teacher::all();
         return response()->json([
            'message' => "Users retrieved successfully",
            'user' => TeacherResource::collection($teachers)
        ]);
    }

    /**
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);
        $teacher = Teacher::create($validated);
        return response()->json([
            'message' => 'User created successfully.',
            'data' => $teacher
        ], 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
        $validated = $request->validated();
        $teacher->update($validated);
        return response()->json([
            'message' => 'Teacher updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
        $teacher->delete();
        return response()->json(['message' => 'Teacher deleted successfully.']);
    }

    public function show ($id){
        $teacher = Teacher::find($id);
        return response()->json([
            'message' => 'There is no teahcer with this ID',
        ]);
        
    }
}
