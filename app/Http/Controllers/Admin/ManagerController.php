<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\EdtController;
use App\Http\Controllers\AdminStudentController;
use App\Http\Controllers\AdminFormationController;
use App\Http\Controllers\GroupController;

use App\Models\Edt;
use App\Models\Manager;
use App\Models\Student;
use App\Models\Formation;
use App\Models\Group;

use Illuminate\Http\Request;

use App\Http\Requests\EdtRequest;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\FormationRequest;
use App\Http\Requests\GroupRequest;
use JetBrains\PhpStorm\NoReturn;


class ManagerController extends Controller
{

    //ce controler doit permettre d'afficher tout les cours d'un journée, et au click sur un cours, afficher les étudiants de ce cours
    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('viewAny', Manager::class);
        $edt = Edt::all();
        return view('admin.manager.index', [
            'edt' => $edt
        ]);
    }

    public function show(Edt $edt): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $this->authorize('view', $edt);
        return view('admin.manager.show', [
            'edt' => $edt
        ]);
    }
}
