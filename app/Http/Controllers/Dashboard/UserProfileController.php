<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(): View
    {
        return view('dashboard.profile.profile');
    }
    public function show_update_profile()
    {
        return view('dashboard.profile.update-profile');
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['string', 'min:3'],
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ]);
        if ($request->file()) {
            $path = '/' . Auth::user()->id . '_' . $request->image?->getClientOriginalName();
            $stored_image =  Storage::disk('public')->put($path, $request->image);
        } else{
            $stored_image = Auth::user()->image;
        }
        $user = User::findOrFail(Auth::user()->id);
        $user->update([
            'name' => $request['name'],
            'bio' => $request['bio'],
            'image' => $stored_image,
        ]);
        return back()->with('toast_success', 'Update user profile successfully');
    }
}
