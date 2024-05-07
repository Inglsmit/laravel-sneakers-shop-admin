<?php

namespace App\Http\Controllers\ModelGroup;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelGroup\UpdateRequest;
use App\Models\ModelGroup;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, ModelGroup $modelGroup)
    {
        $data = $request->validated();
        $modelGroup->update($data);

        return view('modelGroup.show', compact('modelGroup'));
    }
}
