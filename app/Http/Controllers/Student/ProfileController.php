<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        $user = auth()->user()->load('profile');
        return view('student.profile.show', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'nullable|string|max:15',
        ]);
        $user->update($request->only(['name', 'email', 'phone']));

        if ($user->profile) {
            $user->profile->update($request->only(['date_of_birth', 'gender', 'city', 'state', 'education_level', 'exam_target', 'bio']));
        }

        return redirect()->route('student.profile')->with('success', 'Profile updated successfully!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password'         => 'required|min:8|confirmed',
        ]);
        $user = auth()->user();
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }
        $user->update(['password' => Hash::make($request->password)]);
        return redirect()->route('student.profile')->with('success', 'Password changed successfully!');
    }

    public function updateAvatar(Request $request)
    {
        $request->validate(['avatar' => 'required|image|max:2048']);
        $path = $request->file('avatar')->store('avatars', 'public');
        auth()->user()->update(['avatar' => $path]);
        return redirect()->route('student.profile')->with('success', 'Profile picture updated!');
    }
}
