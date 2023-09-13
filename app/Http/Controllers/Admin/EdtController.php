<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EdtRequest;
use App\Models\Edt;
use App\Models\Formation;
use App\Models\Group;
use Illuminate\Http\Request;

class EdtController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Edt::class);
    }

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $edts = Edt::all();
        return view('admin.edt.index', [
            'edt' => $edts
        ]);
    }

    public function show(Edt $edt): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.edt.show', [
            'edt' => $edt
        ]);
    }

    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $group = Group::orderBy('TD_numero', 'asc')->get();
        $formation = Formation::orderBy('name', 'asc')->get();
        return view('admin.edt.create', [
            'formations' => $formation,
            'groups' => $group
        ]);
    }

    public function edit(Edt $edt): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $groups = Group::orderBy('TD_numero', 'asc')->get();
        $formation = Formation::orderBy('name', 'asc')->get();
        return view('admin.edt.edit', [
            'edt' => $edt,
            'formation' => $formation,
            'groups' => $groups
        ]);
    }

    public function store(EdtRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $edt = new Edt();
        $edt->fill($data);
        $edt->save();
        $edt->groups()->attach($data['groups'] ?? null);

        return redirect()->route('admin.edt.show', ['edt' => $edt]);
    }

    public function update(EdtRequest $request, Edt $edt): \Illuminate\Http\RedirectResponse
    {
        //$data = $request->validated();
        $edt->fill($request->validated());
        $edt->save();
        $edt->groups()->sync($data['groups'] ?? null);

        return redirect()->route('admin.edt.show', ['edt' => $edt]);
    }

    public function destroy(Edt $edt): \Illuminate\Http\RedirectResponse
    {
        $edt->delete();
        return redirect()->route('admin.edt.index');
    }


}
