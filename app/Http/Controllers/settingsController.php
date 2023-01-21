<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class settingsController extends Controller
{
    public function userSettings()
    {
        view()->share([
            'pageTitle' => 'Settings',
            'userDetails' => Auth::user()
        ]);
        return view('admin_dashboard.settings.settings');
    }

    public function saveSettings(Request $request)
    {
        $user = Auth::user();
        $validated = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    return $fail(__('The current password is incorrect.'));
                }
            }],
            'password' => ['required', 'confirmed', 'min:8'],
        ]);
        if ($validated->passes()) {
            return response()->json(['success' => 'Added new records.']);
        }
        return response()->json(['error' => $validated->getMessageBag()->toArray()]);
        // return response()->json(['error' => $validated->errors()->all()]);
    }
}
