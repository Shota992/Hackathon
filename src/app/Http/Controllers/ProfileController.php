<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use App\Models\Posting;
use App\Models\User;
use App\Models\Chat;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
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

    public function sidebar()
    {
        $user = Auth::user();
        return view('components.sidebar', compact('user'));
    }

    public function editProfile($id)
    {
        $user = User::findOrFail($id);
        return view('auth.user-edit', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'generation' => ['required', 'numeric', 'between:3.0,7.0'],
            'target' => ['required', 'string', 'max:255'],
            'icon_image' => ['nullable', 'image', 'max:2048'],
        ]);

        $user->generation = $request->generation;
        $user->target = $request->target;

        if ($request->hasFile('icon_image')) {
            // 古い画像を削除
            if ($user->icon_image) {
                Storage::delete('public/private/user_icons/' . $user->icon_image); // 古いファイルを削除
            }
    
            // 新しい画像を保存
            $path = $request->file('icon_image')->store('public/private/user_icons'); // 指定ディレクトリに保存
            $user->icon_image = basename($path); // ファイル名のみ保存
        }

        $user->save();

        return redirect()->route('user.editProfile', $user->id)->with('success', 'User information updated successfully.');
    }

}
