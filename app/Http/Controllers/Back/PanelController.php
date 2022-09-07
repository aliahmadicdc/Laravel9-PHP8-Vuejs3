<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\BaseController;
use Illuminate\View\View;

class PanelController extends BaseController
{
    public function index():View
    {
        $user = auth()->user();

        return view('back.panel.panel', compact('user'));
    }
}
