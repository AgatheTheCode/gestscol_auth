<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();
        return view('group.index', [
            'group' => $groups
        ]);
    }
    public function show(Group $group)
    {
        return view('group.show', [
            'group' => $group
        ]);
    }
}
