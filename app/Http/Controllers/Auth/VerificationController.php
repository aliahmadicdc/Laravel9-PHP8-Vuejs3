<?php

namespace App\Http\Controllers\Auth;

use App\Events\back\ResendSmsVerification;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    use VerifiesEmails;

    public function index()
    {
        $user = auth()->user();

        if ($user->phone_number_verified_at != null)
            return redirect()->route('panel.dashboard');

        return view('auth.verify', compact('user'));
    }

    public function resendCode(): JsonResponse
    {
        event(new ResendSmsVerification(auth()->user()));

        return new JsonResponse([], 202);
    }

    public function checkCode(Request $request): JsonResponse
    {
        $user = auth()->user();

        if ($user->phone_number_verified_at != null) {
            return new JsonResponse([],204);
        }

        if ($user->verifyCodes->last()->code == $request->code) {
            $user->update([
                'phone_number_verified_at' => Carbon::parse(time())->format('Y-m-d H:i:s'),
            ]);

            return new JsonResponse([],204);
        }

        return new JsonResponse([], 401);
    }
}
