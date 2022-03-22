<?php

namespace App\Http\Traits\back;

use App\Events\back\UserPasswordReset;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\back\PasswordReset as PasswordResetModel;
use Carbon\Carbon;
use JetBrains\PhpStorm\ArrayShape;

trait ResetPasswordTrait
{
    private string $phone_number, $token;

    public function showResetForm(Request $request, $token)
    {
        $request->merge(['token' => $token]);

        $validator = Validator::make($request->all(), $this->firstRules());

        if ($validator->fails() || !$this->checkTokenTime($request->token, $request->phone_number))
            abort(403);

        return view('auth.passwordReset');
    }

    public function reset(Request $request): JsonResponse
    {
        $request->validate($this->rules());

        if (!$this->checkTokenTime($request->token, $request->phone_number))
            return response()->json([], 403);

        $this->updatePassword($request);

        return response()->json([],201);
    }

    #[ArrayShape(['token' => "array", 'phone_number' => "array", 'password' => "array"])] protected function rules(): array
    {
        return [
            'token' => ['required', Rule::exists('password_resets', 'token')],
            'phone_number' => ['required', 'string', 'regex:/(09)[0-9]{9}/', 'size:11', Rule::exists('password_resets', 'phone_number')],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ];
    }

    #[ArrayShape(['token' => "array", 'phone_number' => "array"])] protected function firstRules(): array
    {
        return [
            'token' => ['required', Rule::exists('password_resets', 'token')],
            'phone_number' => ['required', 'string', 'regex:/(09)[0-9]{9}/', 'size:11', Rule::exists('password_resets', 'phone_number')],
        ];
    }

    protected function updatePassword($request): void
    {
        $user = User::where('phone_number', $request->phone_number)->update([
            'password' => Hash::make($request->password),
            'remember_token' => Str::random(60)
        ]);

        event(new UserPasswordReset($user));
    }

    protected function checkTokenTime($token, $phone_number)
    {
        return PasswordResetModel::where([
            'phone_number' => $phone_number,
            'token' => $token,
            ['created_at', '>=', Carbon::now()->subMinutes(5)->toDateTimeString()]
        ])->exists();
    }
}
