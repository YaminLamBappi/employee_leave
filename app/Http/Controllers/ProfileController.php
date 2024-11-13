<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class ProfileController extends Controller
{


    public function update_pasword(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->with('error', 'Password Incorrect');
        }


        if ($request->current_password === $request->new_password) {
            return back()->withErrors(['new_password' => 'The new password must be different from the current password.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        $layout = Auth::check() && Auth::user()->role === 'admin' ? 'layouts.admin' : 'layouts.employee';

        return view("profile.password_update", compact('layout'));
    }



    public function password_update()
    {
        $layout = Auth::check() && Auth::user()->role === 'admin' ? 'layouts.admin' : 'layouts.employee';

        return view("profile.password_update", compact('layout'));
    }


    public function update_profile()
    {
        $layout = Auth::check() && Auth::user()->role === 'admin' ? 'layouts.admin' : 'layouts.employee';

        return view("profile.profile_update", compact('layout'));
    }

    public function profile_update(Request $request)
    {

        $user = User::find(Auth::user()->id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    public function profile(): View
    {
        $layout = Auth::check() && Auth::user()->role === 'admin' ? 'layouts.admin' : 'layouts.employee';

        return view('profile.edit', compact('layout'));
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
