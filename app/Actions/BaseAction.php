<?php

namespace App\Actions;

use Illuminate\Http\RedirectResponse;

class BaseAction
{
    public function successResponse($route = 'panel.dashboard', $message = 'با موفقیت انجام شد.'): RedirectResponse
    {
        return redirect()->route($route)->with('success', $message);
    }

    public function errorResponse(): RedirectResponse
    {
        return redirect()->back()->with('warning', trans('messages.errorConnection'));
    }

    public function backResponse($message): RedirectResponse
    {
        return redirect()->back()->with('success', $message);
    }
}
