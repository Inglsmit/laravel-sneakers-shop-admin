<?php

namespace App\Http\Controllers\ModelGroup;

use App\Http\Controllers\Controller;
use App\Models\ModelGroup;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(ModelGroup $modelGroup)
    {
        $modelGroup->delete();

        return redirect()->route('modelGroup.index');
    }
}
