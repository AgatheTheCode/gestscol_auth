<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EdtController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminFormationController;
use App\Http\Controllers\GroupController;

use App\Models\Edt;
use App\Models\Student;
use App\Models\Formation;
use App\Models\Group;

use Illuminate\Http\Request;

use App\Http\Requests\EdtRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\FormationRequest;
use App\Http\Requests\GroupRequest;


class ManagerController extends Controller
{
    //ce controler doit permettre d'afficher tout les cours d'un journée, et au click sur un cours, afficher les étudiants de ce cours
    public function index()
    {
        $edts = Edt::all();
        return view('admin.manager.index', [
            'edts' => $edts
        ]);
    }

    public function show(Edt $edt)
    {
        return view('admin.manager.show', [
            'edt' => $edt
        ]);
    }
}
