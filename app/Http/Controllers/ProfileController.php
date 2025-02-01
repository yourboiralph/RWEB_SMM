<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function index(Request $request) {
        return view('client.profile', [
            'user' => $request->user(),
        ]);
    }

    public function edit(Request $request): View
    {
        return view('client.profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update the user's other attributes.
        $user->fill($request->validated());

        // Reset email verification if the email has changed.
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        // Only update the password if a new password is provided.
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return Redirect::route('client.profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
