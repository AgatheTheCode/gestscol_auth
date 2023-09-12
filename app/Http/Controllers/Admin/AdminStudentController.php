<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Models\Formation;

class AdminStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Student::class);
        $students = Student::all();
        return view('admin.student.index', [
            'student' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Student::class);
        $formation = Formation::orderBy('name','asc')->get();
        return view('admin.student.create', [
            'formations' => $formation
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $this->authorize('create', Student::class);
        $data = $request->validated();
        $student = Student::create($data);
        return redirect()->route('admin.student.show', ['student' => $student]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $this->authorize('view', $student);
        return view('admin.student.show', [
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $this->authorize('update', $student);
        $formation = Formation::orderBy('name','asc')->get();
        return view('admin.student.edit', [
            'formation' => $formation,
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentRequest $request, Student $student)
    {
        $this->authorize('update', $student);
        $data = $request->validated();
        $student->fill($data);
        $student->save();
        return redirect()->route('admin.student.show', ['student' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $this->authorize('delete', $student);
        $student->delete();
        return redirect()->route('admin.student.index');
    }
}
