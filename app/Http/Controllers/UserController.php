<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\LoginLog;

class UserController extends Controller
{
    public function edit()
    {
        return view('profile');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    public function editPassword()
    {
        return view('change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'new_password' => 'required|confirmed|min:8',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }

    public function loginLogs()
    {
        $logs = LoginLog::where('user_id', Auth::id())
            ->latest()
            ->paginate(10);

        return view('login-logs', compact('logs'));
    }
}
