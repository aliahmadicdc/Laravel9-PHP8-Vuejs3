<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\BaseController;
use Illuminate\View\View;

class DashboardController extends BaseController
{
    public function index(): View
    {
        return view('back.dashboard.dashboard');
    }
}
