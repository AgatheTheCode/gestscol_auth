<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', [
            'student' => $students
        ]);
    }

    public function show(Student $student) //remplace le findorfail en étant lié au model
    {
        return view('student.show', [
            'student' => $student
        ]);
    }
}
