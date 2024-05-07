<?php

namespace App\Http\Controllers\ModelGroup;

use App\Http\Controllers\Controller;
use App\Models\ModelGroup;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $modelGroups = ModelGroup::all();
        return view('modelGroup.index', compact('modelGroups'));
    }
}
