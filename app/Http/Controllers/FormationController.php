<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormationRequest;
use App\Models\Formation;
use Illuminate\Http\Request;


class FormationController extends Controller
{
    public function index()
    {
        return view('formation.index');
    }

    public function show(Formation $formation)
    {
        return view('formation.show', [
            'formation' => $formation
        ]);
    }
}
