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
        $userData = User::find($user->id);
        if ($request->action == 'nameAndEmail') {
            $validated = Validator::make($request->all(), [
                'name' => ['required'],
                'email' => ['required', 'email'],
            ]);
            if ($validated->passes()) {
                $userData->name = $request->name;
                $userData->email = $request->email;
                $isSuccess = $userData->save();
                if ($isSuccess) {
                    return response()->json([
                        'message' => 'Data Changed Successfully',
                        'status' => true
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Something Went Wrong',
                        'status' => false
                    ]);
                }
            }
            return response()->json(['error' => $validated->getMessageBag()->toArray()]);
        }
        if ($request->action == 'changePassword') {
            $validated = Validator::make($request->all(), [
                'current_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        return $fail(__('The current password is incorrect.'));
                    }
                }],
                'password' => ['required', 'confirmed', 'min:8'],
            ]);
            if ($validated->passes()) {
                $userData->password = Hash::make($request->password);
                $isSuccess = $userData->save();
                if ($isSuccess) {
                    return response()->json([
                        'message' => 'Data Changed Successfully',
                        'status' => true
                    ]);
                } else {
                    return response()->json([
                        'message' => 'Something Went Wrong',
                        'status' => false
                    ]);
                }
            }
            return response()->json(['error' => $validated->getMessageBag()->toArray()]);
        }

        // return response()->json(['error' => $validated->errors()->all()]);
    }
}
