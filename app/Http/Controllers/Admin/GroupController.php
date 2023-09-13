<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use App\Models\Group;

class GroupController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Group::class, 'group'); //camelcase au lieu de snakecase
    }

    //READ part of CRUD

    public function index(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.group.index', [
            'groups' => Group::orderBy('TD_numero', 'asc')->get()
        ]);
    }

    public function show(Group $group): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.group.show', [
            'group' => $group
        ]);
    }

    //CREATE part of CRUD
    public function create(): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.group.create');
    }

    //STORE part of CRUD

    public function store(GroupRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $group = new Group();
        $group -> fill($data);
        $group->save();
        return redirect()->route('admin.group.show', ['group' => $group]);
    }

    //UPDATE part of CRUD

    public function edit(Group $group): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.group.edit', [
            'group' => $group
        ]);
    }

    public function update(GroupRequest $request, Group $group): \Illuminate\Http\RedirectResponse
    {
        $data = $request->validated();
        $group->fill($data);
        $group->save();
        return redirect()->route('admin.group.show', ['group' => $group]);
    }

    //DELETE part of CRUD
    public function destroy(Group $group): \Illuminate\Http\RedirectResponse
    {
        $group->delete();
        return redirect()->route('admin.group.index');
    }
}
