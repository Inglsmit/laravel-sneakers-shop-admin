<?php

namespace App\Http\Controllers\ModelGroup;

use App\Http\Controllers\Controller;
use App\Models\ModelGroup;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(ModelGroup $modelGroup)
    {
        return view('modelGroup.edit', compact('modelGroup'));
    }
}
