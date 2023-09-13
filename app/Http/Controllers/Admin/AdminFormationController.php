<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormationRequest;
use App\Models\Formation;
use App\Models\Student;
use Illuminate\Http\Request;

class AdminFormationController extends Controller
{
    public function __construct() //pour autoriser l'accès à l'admin pour la création, la modification et la suppression
    {
        $this->authorizeResource(Formation::class);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::all();
        return view('admin.formation.index', [
            'formation' => $formations
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::orderBy('lastname', 'asc')->get();
        return view('admin.formation.create', [
            'students' => $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormationRequest $request)
    {

        $data = $request->validated();
        //dd($data);
        $formation = new Formation();
        $formation->fill($data);
        $formation->save();
        if (!empty($data['student'])) {
            foreach (Student::whereIn('id', $data['student'])->get() as $student) {
                $student->formation()->associate($formation);
                $student->save();
            }
        }
        return redirect()->route('admin.formation.show', ['formation' => $formation]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        return view('admin.formation.show', [
            'formation' => $formation
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        $student = Student::orderBy('lastname', 'asc')->get();
        return view('admin.formation.edit', [
            'formation' => $formation,
            'students' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FormationRequest $request, Formation $formation)
    {
        $data = $request->validated();
        $formation->fill($data);
        $formation->save();
        foreach ($formation->students as $student) { //supprime l'association entre les étudiants et la formation
            $student->formation()->associate(null);
            $student->save();
        }

        if (!empty($data['student'])) { //recrée l'association entre les étudiants et la formation
            foreach (Student::whereIn('id', $data['student'])->get() as $student) {
                $student->formation()->associate($formation);
                $student->save();
            }
        }
        return redirect()->route('admin.formation.show', ['formation' => $formation]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $formation->delete();
        return redirect()->route('admin.formation.index');
    }
}
