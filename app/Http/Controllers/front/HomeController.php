<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\BaseController;
use Illuminate\View\View;

class HomeController extends BaseController
{
    public function index(): View
    {
        return view('front.pages.home');
    }
}
