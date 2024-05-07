<?php

namespace App\Http\Controllers\ModelGroup;

use App\Http\Controllers\Controller;
use App\Http\Requests\ModelGroup\StoreRequest;
use App\Models\ModelGroup;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        ModelGroup::firstOrCreate($data);

        return redirect()->route('modelGroup.index');
    }
}
