<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Rules\MatchOldPassword;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        // abort_if(Gate::denies('profile_password_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('auth.passwords.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'current_password' => ['required',  new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        auth()->user()->update(['password'=> Hash::make($request->new_password)]);

        // return redirect()->back()->with('success', 'Password Updated Success.');

        return redirect()->back()->with('success', __('global.change_password_success'));
    }

    public function updateProfile(UpdateProfileRequest $request)
    {
        $user = auth()->user();

        $user->update($request->validated());

        return redirect()->route('profile.password.edit')->with('message', __('global.update_profile_success'));
    }

    public function destroy()
    {
        $user = auth()->user();

        $user->update([
            'email' => time() . '_' . $user->email,
        ]);

        $user->delete();

        return redirect()->route('login')->with('message', __('global.delete_account_success'));
    }

    public function toggleTwoFactor(Request $request)
    {
        $user = auth()->user();

        if ($user->two_factor) {
            $message = __('global.two_factor.disabled');
        } else {
            $message = __('global.two_factor.enabled');
        }

        $user->two_factor = !$user->two_factor;

        $user->save();

        return redirect()->route('profile.password.edit')->with('message', $message);
    }
}
